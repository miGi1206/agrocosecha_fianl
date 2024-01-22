<?php 

    //! Conectarse con la base de datos
    include("../../conections/coneccion_tabla.php");

    //! traer el ID de la base de datos
    $id=$_GET["id"];

    //! Consulta para traer la informacion del cliente
    $sql="SELECT * FROM tbl_producto WHERE `tbl_producto`.`id`='$id'";
    $query=mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrocosecha</title>
    <link rel="stylesheet" href="../../css/formulario_registro.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>Agrocosecha</title>
    <link rel="website icon" type="jpg" href="../../img/Size-16.jpg">
</head>
<body>

    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Modificar Producto</b></h3>
        </div>
        <form action="../../controladores/producto/modificar_producto.php" method="POST">
            <div class="form-group">
                <label for="identificacion">Identificacion:</label>
                <input type="number" id="identificacion" name="identificacion" value="<?= $row['id']?>" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"  value="<?= $row['nombre']?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea type="text" id="descripcion" name="descripcion" rows="4" required><?= $row['descripcion']?></textarea>
            </div>
            

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio"  value="<?= $row['precio']?>" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" value="<?= $row['stock']?>" required>
            </div>

            <button type="submit" class="submit" name="modificar_producto">Actualizar</button>
        </form>
    </div> 
    <!--//TODO: Fin formulario de registro del cliente -->
    
</body>
</html>
