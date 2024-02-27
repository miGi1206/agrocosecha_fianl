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

    //! Conectarce a la funcion para eliminar el producto
    include "../../controladores/producto/eliminar_producto.php"; 
    ?>

<style>
    .contenido-fijo {
        position: fixed;
        top: 0;
        /* Puedes ajustar la posición superior según tus necesidades */
        left: 0;
        /* Puedes ajustar la posición izquierda según tus necesidades */
        width: 100%;
        /* Establecer el ancho al 100% para que ocupe todo el ancho de la pantalla */
        z-index: 1000;
        /* Puedes ajustar la propiedad z-index según tus necesidades */
    }
    .fuera-navbar{
        margin-top:6%;
    }
    @media (max-width: 1000px) {
    .fuera-navbar {
        margin-top:10%; 
    }
    }
    @media (max-width: 500px) {
    .fuera-navbar {
        margin-top:15%; 
    }
    }
    </style>
    <div class="contenido-fijo">
        <?php include "../../complementos/navbar_admin.php";?>
    </div>

    <!-- //* alerta nuevo registro -->
    <?php
    include "../../controladores/alertas.php";
    ?>


    <h1 class="fuera-navbar">Productos</h1>

    <!-- //! Barra de busqueda -->
    <div class="container-fluid" style="display:flex; justify-content:center;">
        <form class="d-flex" style="width: 70%;">
            <form action="" method="GET">

                <!-- //TODO: informacion sobre busqueda -->
                <div class="btn-group" style="height:30px !important">
                    <button type="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="margin-top:5px; background-color:transparent !important; border:none;">
                        <img src="../../img/informacion.png" alt="">
                    </button>
                    <ul class="dropdown-menu" style="width:200px !important;">
                        <p style="padding:10% !important;">
                            Puedes buscar por: <br>
                            codigo de producto, <br>
                            nombre y<br>
                            fecha de registro: <br>
                            <span style="color:red;">AAAA/MM/DD</span>
                            <br><br>
                            <span style="color:#065F2C;">
                            <b>
                            Para regresar darle
                            click a buscar sin nada en la barra
                            de busqueda
                            </b>
                            </span>
                        </p>
                    </ul>
                </div>
                <!-- //TODO: Fin de informacion sobre busqueda -->
                <input style="border-radius:30px; height:70% !important;"class="form-control me-2" type="search" placeholder="Buscar" name="busqueda">
                <button style="height:auto !important; margin-top:0px !important; border-radius:100px;" class="botones" type="submit" name="enviar">Buscar</button>
            </form>
        </form>
    </div>
    <!-- //! Fin barra de busqueda -->

    <?php
    $buscar="";
    if (isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'];

        if (isset($_GET['busqueda'])){
            $buscar = "WHERE codigo_producto LIKE '%".$busqueda."%' OR nombre LIKE '%".$busqueda."%' OR fecha_registro LIKE '%".$busqueda."%'";
        }
    }
    ?>

    <div class="tabla_container" style="margin-top:-15px !important;  width:100%;">
        <button class="boton-registrar"><a href="./formulario_producto.php" class="text-decoration-none"
                style="color:white;"><b>Registrar</b></a></button>
        <div style="overflow-x:auto !important; width:100% !important;">
            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Video</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT * FROM `tbl_producto` $buscar";

                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)){ 
                    ?>
                    <tr>
                        <td><?php echo $row["codigo_producto"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php
                            $descripcion_corta = substr($row["descripcion"], 0, 100);
                            $descripcion_larga = substr($row["descripcion"], 100);

                            echo "<span codigo_producto='resumen" . $row['codigo_producto'] . "'>" . $descripcion_corta . "</span>";

                            if (strlen($row["descripcion"]) > 100) {
                                echo "<span codigo_producto='detalle" . $row['codigo_producto'] . "' style='display:none;'>" . $descripcion_larga . "</span>";
                                echo "<button onclick='leerMas(" . $row['codigo_producto'] . ")' style='background-color: transparent; border:none; color:blue;'>Leer más</button>";
                                echo "<button onclick='leerMenos(" . $row['codigo_producto'] . ")' style='display:none; background-color: transparent; border:none; color:blue;'>Leer menos</button>";
                            }
                            ?>
                        </td>
                        <td>$ <?php echo number_format($row["precio"], 0, ',', '.'); ?></td>
                        <td><?php echo $row["stock"] ?></td>
                        <td><?php echo $row["video"] ?></td>
                        <td><?php echo $row["fecha_registro"] ?></td>
                        <td style="display:grid; grid-template-columns: repeat(2,1fr); padding-top:15px; padding-bottom:15px;">
                            <form method="POST" action="./formulario_modi_producto.php">
                                <a href="./formulario_modi_producto.php?id=<?php echo $row['codigo_producto'];?>" type="botton"
                                    class="botones" style="text-decoration:none !important; color:white; margin-right:5px; background-color: #FFCC03 !important;">Editar</a>
                            </form>
                            <!-- //* Coneccion con la funcion para eliminar el registro -->
                            <form method="POST" class="eliminarForm" style="margin-top:-13px;">
                                <input type="hidden" name="id_a_eliminar" class="id_a_eliminar_input"
                                    style="margin-top:5% !important;" value="<?php echo $row['codigo_producto']; ?>">
                                <button type="submit" name="registro_eliminar" class="botones eliminarBtn" style="background-color:red;">
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
    <?php
    include "../../controladores/alerta_eliminar.php";
    ?>

</body>

</html>