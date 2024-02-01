<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: /agrocosecha_final/index.php");
        exit();
    }
    
    
?>
<?php 
    //! Conectarse a la base de datos
    include("../../conections/coneccion_tabla.php");

    //! Toma el id del admin para modificarlo
    $id=$_GET["id"];
    $sql="SELECT * FROM tbl_admin WHERE `tbl_admin`.`id`='$id'";
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>
<body>
    <!-- //TODO: Formulario para modificar al admin; el formulario se muestra con la informacion de la base de datos -->
    <div id="form-container">
        <div class="contenedor">
            <div id="productos">
                <h1 class="text-success"><b>Modificar administrador</b></h1>
            </div> 
        <form action="../../controladores/admin/modificar_admin.php" method="POST">
            
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="identificacion" type="number" class="form-control cuadro_texto1" id="floatingInputidentificacion" placeholder="Identificacion" value="<?= $row['id']?>" readonly requered>
                <label for="floatingInputidentificacion">Identificación:</label>
            </div>
            
            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="nombre" value="<?= $row['nombre']?>" requered>
                <label for="nombre">Nombre:</label>
                <div id="result_nombre" style="color:red; font-size:15px;"></div>
            </div>
            
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="correo" type="email" class="form-control cuadro_texto1" id="correo" placeholder="Correo" value="<?= $row['correo']?>" requered>
                <label for="correo">Correo electronico:</label>
            </div>
            
            <div class="form-floating mb-3" style="margin-top: 3%;">
                <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="Usuario" value="<?= $row['usuario']?>" requered>
                <label for="usuario">usuario:</label>
                <div id="result_usuario" style="color:red; font-size:15px;"></div>
            </div>
            
            <button type="submit" name="sumit">Actualizar</button>
        </form>
    </div>
</div>
<script src="../../js/validaciones.js"></script>
</body>
</html>
