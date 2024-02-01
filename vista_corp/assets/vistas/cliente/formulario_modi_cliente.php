<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("Location: /agrocosecha_final/index.php");
        exit();
    }
    
    
?>
<?php 

    //! Conectarse con la base de datos
    include("../../conections/coneccion_tabla.php");

    //! traer el ID de la base de datos
    $id=$_GET["id"];

    //! Consulta para traer la informacion del cliente
    $sql="SELECT * FROM tbl_cliente WHERE `tbl_cliente`.`id`='$id'";
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
    <link rel="website icon" type="jpg" href="../assets/img/Size-16.jpg">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Modificar cliente</b></h3>
        </div>
        <form action="../../controladores/cliente/modificar_cliente.php" method="POST">

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="identificacion" type="number" class="form-control cuadro_texto1" id="floatingInputidentificacion" placeholder="Identificacion" value="<?= $row['id']?>" readonly requered>
                <label for="floatingInputidentificacion">Identificación:</label>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" value="<?= $row['nombre']?>" requered>
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

            <button type="submit" class="submit" name="actualizar_cliente">Actualizar</button>
        </form>
    </div> 
    <!--//TODO: Fin formulario de registro del cliente -->
    
    <script src="../../js/validaciones.js"></script>

</body>
</html>
