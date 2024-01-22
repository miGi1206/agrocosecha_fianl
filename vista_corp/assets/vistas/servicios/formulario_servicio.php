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

    <?php include "../../conections/coneccion_tabla.php";?>

    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar servicio</b></h3>
        </div>
        <form action="../../controladores/servicio/registrar_servicio.php" method="POST" >
            <div class="form-group">
                <label for="identificacion">Identificacion:</label>
                <input type="number" id="identificacion" name="identificacion" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de producto:</label>
                <select id="tipo" name="tipo">
                <?php
                
                //TODO: Consulta SQL para traer todos los datos de los administradores
                    $sql_tipo_servicio = "SELECT codigo_tipo,tipo FROM `tipo_servicio`";
                    $result = mysqli_query($conn,$sql_tipo_servicio);
                    

                    //* Ciclo para mostrar los registros
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row['codigo_tipo']."'>".$row['tipo']."</option>"; 
                    }?>               
                </select>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="float" id="precio" name="precio" required>
            </div>

            <div class="form-group">
                <label for="duracion">Duracion por hora:</label>
                <input type="number" id="duracion" name="duracion" required>
            </div>

            <button type="submit" class="submit" name="guardar_servicio">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</div>
</body>
</html>
