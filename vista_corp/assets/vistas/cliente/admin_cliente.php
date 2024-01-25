<?php
    session_start();
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

    //! Conectar con la funcion para eliminar al cliente
    include "../../controladores/cliente/eliminar_cliente.php"; 
    ?>

    <!-- //TODO: Navbar -->
    <?php include "../../complementos/navbar_admin.php";?>
    <!-- //TODO: Fin del navbar -->

    <!-- //* alerta nuevo registro -->
    <?php
    if(isset($_SESSION['msj_registrar'])){
        $respuesta = $_SESSION['msj_registrar'];?>
    <script>
    Swal.fire({
        title: "Informacion guardada exitosamente",
        text: "",
        icon: "success"
    });
    </script>

    <?php
    unset($_SESSION['msj_registrar']);
    }
    ?>

    <!-- //* alerta modificar registro -->
    <?php
    if(isset($_SESSION['msj_modificar'])){
        $respuesta = $_SESSION['msj_modificar'];?>
    <script>
    Swal.fire({
        title: "Informacion modificada exitosamente",
        text: "",
        icon: "success"
    });
    </script>

    <?php
    unset($_SESSION['msj_modificar']);
    }
    ?>




    <h1>Clientes</h1>

    <!-- //TODO: Inicio de la tabla de los clientes -->
    <div class="tabla_container">
        <button class="boton-registrar"><a href="./formulario_cliente.php" class="text-decoration-none"
                style="color:white;"><b>Registrar</b></a></button>
        <div style="overflow-x:auto !important; width:100% !important;">
            <table>
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombres</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //! Consulta para mostrar la informacion de los clientes que esta en la base de datos
                    $sql = "SELECT * FROM `tbl_cliente`";
                    $result = mysqli_query($conn,$sql);

                    //TODO: Ciclo para mostrar la informacion de los clientes
                    while ($row = mysqli_fetch_assoc($result)){ 
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php echo $row["usuario"] ?></td>
                        <td><?php echo $row["contraseña"] ?></td>
                        <td><?php echo $row["correo"] ?></td>
                        <td
                            style="display:grid; grid-template-columns: repeat(2,1fr); padding-top:15px; padding-bottom:15px;">

                            <!-- //* Enviar al formulario para modificar -->
                            <form method="POST" action="./formulario_modi_cliente.php" data-form="editar">
                                <a href="./formulario_modi_cliente.php?id=<?php echo $row['id'];?>" type="botton"
                                    class="botones"
                                    style="text-decoration:none !important; color:white; margin-right:5px;">Editar</a>
                            </form>
                            <!-- //* Enviar a la funcion de eliminar -->
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
    <!-- //TODO: Fin de la tabla de los clientes -->

    <!-- Scripts de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="/agrocosecha_final/vista_corp/assets/js/alert_eliminar.js"></script>

    <!-- //* alerta eliminar registro -->
    <script>
    // Utiliza clases en lugar de ids para los botones y formularios
    let eliminarBtns = document.querySelectorAll('.eliminarBtn');

eliminarBtns.forEach(function(btn) {
    btn.addEventListener('click', function(event) {
        event.preventDefault();
        let idAEliminar = btn.parentElement.querySelector('.id_a_eliminar_input').value;

        Swal.fire({
            title: "¿Estás seguro de eliminar la información con ID " + idAEliminar + "?",
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
                        title: "Informacion eliminada",
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