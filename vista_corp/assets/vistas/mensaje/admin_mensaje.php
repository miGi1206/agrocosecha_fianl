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
</head>

<body>
    <?php 
    //! Conectarse a la base de datos
    include "../../conections/coneccion_tabla.php";

    //! Conectarce a la funcion para eliminar el producto
    include "../../controladores/producto/eliminar_producto.php"; 
    ?>

    <!-- //TODO: Navbar -->
    <?php include "../../complementos/navbar_admin.php";?>
    <!-- //TODO: Fin del navbar -->


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

                    $sql = "SELECT * FROM `contactanos`";

                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)){ 
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php echo $row["telefono"] ?></td>
                        <td><?php echo $row["correo"] ?></td>
                        <td><?php echo $row["municipio"] ?></td>
                        <td><?php echo $row["producto_interes"] ?></td>
                        <td><?php
                                // Muestra solo una parte de la información y agrega un botón "Leer más"
                                echo "<span id='resumen" . $row['id'] . "'>" . substr($row["mensaje"], 0, 100) . "</span>";
                                echo "<span id='detalle" . $row['id'] . "' style='display:none;'>" . substr($row["mensaje"], 100) . "</span>";
                                echo "<button onclick='leerMas(" . $row['id'] . ")' style='background-color: transparent; border:none; color:blue;'>Leer más</button>";
                                echo "<button onclick='leerMenos(" . $row['id'] . ")' style='display:none; background-color: transparent; border:none; color:blue;'>Leer menos</button>";
                        ?></td>
                        <td><?php echo $row["fecha_envio"] ?></td>
                        <td>
                            
                            <form action="#" method="POST">
                                <div>
                                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                                        <li class="nav-item">
                                            <a class="botones" href="#" data-bs-toggle="modal"
                                                style="border:none !important; color:white;"
                                                data-bs-target="#exampleModalToggle" aria-expanded="false"
                                                role="button">Eliminar</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div
                                                    style="width:100%; display:flex; justify-content:center; aling-item:center; ">
                                                    <img src="../../../assets/img/eliminar.jpg" alt="">
                                                </div>
                                                <div class="z-flex2">
                                                    <p>
                                                        <center>Esta seguro de eliminar el mensaje</center>
                                                    </p>
                                                </div>

                                                <div
                                                    style="width:100%; display:flex; justify-content:space-evenly; aling-item:center; ">
                                                    <form method="POST">
                                                        <input type="hidden" name="id_a_eliminar"
                                                            value="<?php echo $row['id']; ?>">
                                                        <button type="submit" name="registro_eliminar"
                                                            class="botones">Eliminar</button>
                                                    </form>
                                                    <button type="button" class="botones" data-bs-dismiss="modal"
                                                        aria-label="Close">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

</body>

</html>