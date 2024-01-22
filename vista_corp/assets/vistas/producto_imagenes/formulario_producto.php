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

    <!-- //TODO: Formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar producto</b></h3>
        </div>
        <form action="../../controladores/producto/registrar_producto.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="identificacion">Identificacion:</label>
                <input type="number" id="identificacion" name="identificacion" required>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea type="text" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" required>
            </div>

            <div class="form-group">
                <label for="fotos">Fotos:</label>
                <input type="file" id="fotos" name="fotos[]" multiple accept="image/*" required>
            </div>

            <button type="submit" class="submit" name="guardar_producto">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</body>
</html>
