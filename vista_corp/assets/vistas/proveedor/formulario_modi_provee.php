<?php 
    //! Conectarse a la base de datos
    include("../../conections/coneccion_tabla.php");

    //! Toma el id del admin para modificarlo
    $id=$_GET["id"];
    $sql="SELECT * FROM tbl_proveedor WHERE `tbl_proveedor`.`id`='$id'";
    $query=mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrocosecha</title>
    <link rel="stylesheet" href="../../../assets/css/formulario_admin.css ">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>Agrocosecha</title>
    <link rel="website icon" type="jpg" href="../../img/Size-16.jpg">
</head>
<body>
    <!-- //TODO: Formulario para modificar al admin; el formulario se muestra con la informacion de la base de datos -->
    <div id="form-container">
        <div class="contenedor">
            <div id="productos">
                <h1 class="text-siccess" style="color: #065F2C;"><b>Proveedor</b></h1>
            </div> 
        <form action="../../controladores/proveedor/modificar_proveedor.php" method="POST">

            <label for="identificacion">Identificación:</label>
            <div class="form-floating mb-3">
                <input name="identificacion" type="number" class="form-control cuadro_texto1" id="identificacion" placeholder="Identificacion" value="<?= $row['id']?>" requered>
                <label for="identificacion">Identificación</label>
            </div>

            <label for="nombre">Nombre:</label>
            <div class="form-floating mb-3">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" value="<?= $row['nombre']?>" requered>
                <label for="nombre">Nombre</label>
            </div>

            <label for="usuario">Usuario:</label>
            <div class="form-floating mb-3" style="margin-top: 3%;">
                <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="Usuario" value="<?= $row['usuario']?>" requered>
                <label for="usuario">usuario</label>
            </div>

            <label for="contraseña">Contraseña:</label>
            <div class="form-floating mb-3">
                <input name="contraseña" type="password" class="form-control cuadro_texto1" id="contraseña" placeholder="Contraseña" requered>
                <label for="contrasena">Contraseña</label>
            </div>

            <label for="telefono">Telefono:</label>
            <div class="form-floating mb-3">
                <input name="telefono" type="number" class="form-control cuadro_texto1" id="telefono" placeholder="telefono" value="<?= $row['telefono']?>" requered>
                <label for="telefono">Telefono</label>
            </div>

            <label for="correo">Correo:</label>
            <div class="form-floating mb-3">
                <input name="correo" type="email" class="form-control cuadro_texto1" id="correo" placeholder="Correo" value="<?= $row['correo']?>" requered>
                <label for="correo">Correo</label>
            </div>       
            
            <button type="submit" name="modificar_proveedor">Actualizar</button>
        </form>
    </div>
    <!-- //TODO: Fin del formulario -->
</div>
</body>
</html>
