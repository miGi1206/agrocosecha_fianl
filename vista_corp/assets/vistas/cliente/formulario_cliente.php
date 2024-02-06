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
    <link rel="stylesheet" href="../../css/formulario_registro.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>Agrocosecha</title>
    <link rel="website icon" type="jpg" href="../../img/Size-16.jpg">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>


    <!-- //TODO: Formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar cliente</b></h3>
        </div>
        <form action="../../controladores/cliente/registrar_cliente.php" method="POST">

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="identificacion" type="number" class="form-control cuadro_texto1" id="floatingInputidentificacion" placeholder="Identificacion" requered>
                <label for="floatingInputidentificacion">Identificacion:</label>
            </div>

            <div class="form-floating mb-3" style="margin-bottom:0px !important; margin-top:15px;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="floatingInputNombre" placeholder="Nombre" requered>
                <label for="floatingInputNombre">Nombre:</label>
            </div>
            <label for="floatingInputcorreo" style="color:red;">Solo letras</label>

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="correo" type="email" class="form-control cuadro_texto1" id="floatingInputcorreo" placeholder="correo" requered>
                <label for="floatingInputcorreo">Correo:</label> 
            </div>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                <input name="usuario" type="text" class="form-control cuadro_texto1" id="floatingInputusuario" placeholder="Usuario" requered>
                <label for="floatingInputusuario">Usuario:</label>
            </div>
            <label for="floatingInputcorreo" style="color:red;">Maximo 20 caracteres</label>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                <input name="contraseña" type="password" class="form-control cuadro_texto1" id="floatingInputcontraseña" placeholder="contraseña" requered>
                <label for="floatingInputcontraseña">Contraseña:</label>
            </div>
            <label for="floatingInputcorreo" style="color:red;">Entre 6 a 20 caracteres</label>

            <button type="submit" class="submit" name="guardar_cliente">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</body>
</html>
