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
    // include "../../controladores/proveedor/eliminar_proveedor.php"; 
    ?>

    <!-- //TODO: Navbar -->
    <?php include "../../complementos/navbar_admin.php";?>
    <!-- //TODO: Fin del navbar -->


    <h1>Productos</h1>
    <div class="buscar">
        <input class="barra" placeholder="Buscar por identificación, nombres, usuario, etc.">
    </div>
    <div class="contenedor">
        <button class="boton-registrar"><a href="formulario_producto.php" class="text-decoration-none"
                style="color:white;"><b>Registrar</b></a></button>
        <div style="overflow-x:auto !important; width:100% !important;">
            <table>
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombres</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Fecha de Registro</th>
                        <th>Stock</th>
                        <th>Fotos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT tbl_producto.* , imagen_producto.foto 
                    FROM tbl_producto,imagen_producto 
                    WHERE tbl_producto.id=imagen_producto.id_producto GROUP BY tbl_producto.id";

                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)){ 
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["nombre"] ?></td>
                        <td><?php echo $row["descripcion"] ?></td>
                        <td><?php echo $row["precio"] ?></td>
                        <td><?php echo $row["fecha_registro"] ?></td>
                        <td><?php echo $row["stock"] ?></td>
                        <td><a href="./ver_fotos.php?id_foto=<?php echo $row["id"] ?>">Ver fotos</a></td>
                        <td style="display:grid; grid-template-columns: repeat(2,1fr); padding-top:15px; padding-bottom:15px;">
                            <form method="POST" action="./formulario_modi_producto.php">
                                <a href="./formulario_modi_producto.php?id=<?php echo $row['id'];?>" type="botton"
                                    class="botones" style="text-decoration:none !important; color:white; margin-right:5px;">Editar</a>
                            </form>
                            <form method="POST">
                                <input type="hidden" name="id_a_eliminar" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="registro_eliminar" class="botones">Eliminar</button>
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
    <div class="container d-flex justify-content-center align-items-center">
        <div class="btn-group me-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-color ">1</button>
            <button type="button" class="btn btn-color ">2</button>
            <button type="button" class="btn btn-color ">3</button>
            <button type="button" class="btn btn-color ">4</button>
        </div>
    </div>


    <!-- Scripts de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

</body>

</html>