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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.jpg">
</head>
<body>

    <!-- //TODO: Formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar producto</b></h3>
        </div>
        <form action="../../controladores/producto/registrar_producto.php" method="POST" >

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="codigo_producto" type="number" class="form-control cuadro_texto1" id="floatingInputidentificacion" placeholder="codigo_producto" requered>
                <label for="floatingInputidentificacion">Codigo:</label>
            </div>

            <div class="form-floating mb-3" style="margin-bottom:15px !important; margin-top:15px;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" requered>
                <label for="nombre">Nombre:</label>
                <div id="result_nombre" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea type="text" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-right: 5%;">
                    <input name="precio" type="number" class="form-control cuadro_texto1" id="floatingInputprecio" placeholder="precio" requered>
                    <label for="floatingInputprecio">Precio:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input name="stock" type="number" class="form-control cuadro_texto1" id="floatingInputstock" placeholder="stock" requered>
                    <label for="floatingInputstock">Stock:</label>
                </div>
            </div>

            <!-- //TODO: aqui va el campo para el video-->
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="video" type="text" class="form-control cuadro_texto1" id="floatingInputvideo" placeholder="video" requered>
                <label for="floatingInputvideo">Video:</label>
            </div>

            <button type="submit" class="submit" name="guardar_producto">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->

    <script src="../../js/validaciones.js"></script>

</body>
</html>
