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
<?php
    if(isset($_SESSION['msj_contraseña'])){
        $respuesta = $_SESSION['msj_contraseña'];?>
        <script>
            Swal.fire({
                title: "contraseña invalida",
                text: "",
                icon: "success"
            });
        </script>

    <?php
    unset($_SESSION['msj_contraseña']);
    }
    ?>

    <!-- //TODO: Formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar cliente</b></h3>
        </div>
        <form action="../../controladores/cliente/registrar_cliente.php" method="POST">
            <div class="form-group">
                <label for="identificacion">Identificacion:</label>
                <input type="number" id="identificacion" name="identificacion" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo electronico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required >
            </div>

            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" required title="Minimo 6 caracteres - Maximo 20 caracteres">
            </div>

            <button type="submit" class="submit" name="guardar_cliente">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</body>
</html>
