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

    //! Conectar con la funcion para eliminar al cliente
    include "../../controladores/cliente/eliminar_cliente.php"; 
    ?>

    <!-- //TODO: Navbar -->
    <?php include "../../complementos/navbar_admin.php";?>
    <!-- //TODO: Fin del navbar -->

    <!-- //* alerta nuevo registro -->
    <?php
    include "../../controladores/alertas.php";
    ?>




    <h1>Clientes</h1>

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
                            identificacion, <br>
                            nombre, <br>
                            usuario, <br>
                            correo <br>
                            <br>
                            <span style="color:#065F2C;">
                            <b>
                            Para regresar darle
                            click a buscar sin nada en la barra
                            en la barra de busqueda
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
            $buscar = "WHERE id LIKE '%".$busqueda."%' OR nombre LIKE '%".$busqueda."%' OR usuario LIKE '%".$busqueda."%' OR correo LIKE '%".$busqueda."%'";
        }
    }
    ?>

    <!-- //TODO: Inicio de la tabla de los clientes -->
    <div class="tabla_container" style="margin-top:-15px !important;">
        <button class="boton-registrar"><a href="./formulario_cliente.php" class="text-decoration-none"
                style="color:white;"><b>Registrar</b></a></button>
        <div style="overflow-x:auto !important; width:100% !important;">
            <table>
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombres</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //! Consulta para mostrar la informacion de los clientes que esta en la base de datos
                    $sql = "SELECT * FROM `tbl_cliente` $buscar";
                    $result = mysqli_query($conn,$sql);

                    //TODO: Ciclo para mostrar la informacion de los clientes
                    while ($row = mysqli_fetch_assoc($result)){ 
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php echo $row["correo"] ?></td>
                        <td><?php echo $row["usuario"] ?></td>
                        <td><?php echo $row["contraseña"] ?></td>
                        <td
                            style="display:grid; grid-template-columns: repeat(2,1fr); padding-top:15px; padding-bottom:15px;">

                            <!-- //* Enviar al formulario para modificar -->
                            <form method="POST" action="./formulario_modi_cliente.php" data-form="editar">
                                <a href="./formulario_modi_cliente.php?id=<?php echo $row['id'];?>" type="botton"
                                    class="botones"
                                    style="text-decoration:none !important; color:white; margin-right:5px;">Editar</a>
                            </form>
                            <!-- //* Enviar a la funcion de eliminar -->
                            <form method="POST" class="eliminarForm" style="margin-top:-13px;">
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
    <?php
    include "../../controladores/alerta_eliminar.php";
    ?>


</body>

</html>