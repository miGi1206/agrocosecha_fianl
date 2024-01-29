<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: /agrocosecha_final/index.php");
        exit();
    }
    
    
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrocosecha</title>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
    <link rel="stylesheet" href="../../css/admin_cliente.css">
    <link rel="stylesheet" href="../../css/navbar_cliente.css">
    <link rel="stylesheet" href="../../css/navbar_admin.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    

    <?php 
    //! Conectarse a la base de datos
    include "../../conections/coneccion_tabla.php";

    //! Conectarce a la funcion para eliminar el mensaje
    include "../../controladores/mensajes/eliminar_mensaje.php"; 
    ?>

    <!-- //TODO: Navbar -->
    <?php include "../../complementos/navbar_admin.php";?>
    <!-- //TODO: Fin del navbar -->


    <!-- //* alerta sesion iniciada -->
    <?php
    if(isset($_SESSION['msj_inicio_sesion'])){
        $respuesta = $_SESSION['msj_inicio_sesion'];?>
    <script>
    Swal.fire({
        title: "Sesion iniciada",
        text: "",
        icon: "success",
        timer: 2000,
        timerProgressBar: true,
        backdrop: false
    });
    </script>

    <?php
    unset($_SESSION['msj_inicio_sesion']);
    }
    ?>

    <h1>Mensajes</h1>

    <div class="tabla_container">

        <div style="overflow-x:auto !important; width:100% !important;">
            <table>
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombres</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Municipio</th>
                        <th>Producto de interes</th>
                        <th>Mensaje</th>
                        <th>Fecha de envio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT `contactanos`.`id`, `contactanos`.`nombre`, `contactanos`.`telefono`,
                    `contactanos`.`correo`, `contactanos`.`municipio`, `tbl_producto`.`nombre`, 
                    `contactanos`.`mensaje`, `contactanos`.`fecha_envio` FROM `contactanos`, 
                    `tbl_producto` WHERE `contactanos`.`producto_interes` = `tbl_producto`.`id`";

                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)){ 
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php echo $row["telefono"] ?></td>
                        <td><?php echo $row["correo"] ?></td>
                        <td><?php echo $row["municipio"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php
                                // Muestra solo una parte de la información y agrega un botón "Leer más"
                                echo "<span id='resumen" . $row['id'] . "'>" . substr($row["mensaje"], 0, 100) . "</span>";
                                echo "<span id='detalle" . $row['id'] . "' style='display:none;'>" . substr($row["mensaje"], 100) . "</span>";
                                echo "<button onclick='leerMas(" . $row['id'] . ")' style='background-color: transparent; border:none; color:blue;'>Leer más</button>";
                                echo "<button onclick='leerMenos(" . $row['id'] . ")' style='display:none; background-color: transparent; border:none; color:blue;'>Leer menos</button>";
                        ?></td>
                        <td><?php echo $row["fecha_envio"] ?></td>
                        <td>

                        <form method="POST" class="eliminarForm">
                                <input type="hidden" name="id_a_eliminar" class="id_a_eliminar_input"
                                    value="<?php echo $row['id']; ?>">
                                <button type="submit" name="registro_eliminar" class="botones eliminarBtn"
                                    data-target="<?php echo $row['id']; ?>">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php    
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "../../complementos/leer+-.php";?>
    <!-- Scripts de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

    <!-- //* alerta eliminar registro -->
    <script>
        // Utiliza clases en lugar de ids para los botones y formularios
        let eliminarBtns = document.querySelectorAll('.eliminarBtn');

        eliminarBtns.forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                event.preventDefault();
                let idAEliminar = btn.parentElement.querySelector('.id_a_eliminar_input').value;

                Swal.fire({
                    title: "¿Estás seguro de eliminar el mesaje?",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Obtener el formulario ascendente más cercano al botón actual
                        let formulario = btn.closest('form');

                        if (formulario) {
                            // Si el formulario existe, enviarlo
                            Swal.fire({
                                title: "Mensaje eliminada",
                                text: "",
                                icon: "success",
                                willClose: () => {
                                    formulario.submit();
                                }
                            });
                        } else {
                            // Manejar el caso en que no se encuentra el formulario
                            Swal.fire({
                                title: "Error",
                                text: "No se encontró el formulario asociado al botón",
                                icon: "error"
                            });
                        }
                    } else {
                        Swal.fire({
                            title: "Eliminacion cancelada",
                            text: "",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>