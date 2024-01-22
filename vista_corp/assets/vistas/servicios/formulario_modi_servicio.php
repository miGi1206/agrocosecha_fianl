<?php 
    //! Conectarse a la base de datos
    include("../../conections/coneccion_tabla.php");

    //! Toma el id del admin para modificarlo
    $id=$_GET["id"];
    $sql="SELECT `tbl_servicio`.`id`, `tbl_servicio`.`nombre`, `tipo_servicio`.`tipo`, `tipo_servicio`.`codigo_tipo`,
    `tbl_servicio`.`descripcion`, `tbl_servicio`.`precio`, `tbl_servicio`.`fecha_registro`,
    `tbl_servicio`.`duracion`  FROM `tbl_servicio`, `tipo_servicio` WHERE 
    `tbl_servicio`.`tipo_servicio` = `tipo_servicio`.`codigo_tipo` AND `tbl_servicio`.`id` = $id";
    $query=mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrocosecha</title>
    <link rel="stylesheet" href="../../../assets/css/formulario_registro.css ">
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
            <h3 class="text-success h1 formulario"><b>Modificar servicio</b></h3>
        </div>
        <form action="../../controladores/servicio/modificar_servicio.php" method="POST">
            <div class="form-group">
                <label for="identificacion">Identificacion:</label>
                <input type="number" id="identificacion" name="identificacion" value="<?= $row['id']?>" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo de producto:</label>
                <select id="tipo" name="tipo">
                    <?php
    // Almacena el valor actual en una variable antes del bucle
    $valorActual = $row['codigo_tipo'];
    $valorActual2 = $row['tipo'];

    // Muestra el valor actual como la primera opción
    echo "<option value='$valorActual'>$valorActual2</option>";

    // Consulta SQL para traer todos los datos de los tipos de servicio
    $sql_tipo_servicio = "SELECT codigo_tipo, tipo FROM `tipo_servicio`";
    $result = mysqli_query($conn, $sql_tipo_servicio);

    // Ciclo para mostrar los registros
    while ($row2 = mysqli_fetch_assoc($result)) {
        // Verifica que el valor no sea igual al valor actual
        if ($row2['codigo_tipo'] != $valorActual) {
            echo "<option value='" . $row2['codigo_tipo'] . "'>" . $row2['tipo'] . "</option>";
        }
    }
    ?>
                </select>
            </div>



            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $row['nombre']?>" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required><?= $row['descripcion']?></textarea>
            </div>

            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="float" id="precio" name="precio" value="<?= $row['precio']?>" required>
            </div>

            <div class="form-group">
                <label for="duracion">Duracion por hora:</label>
                <input type="number" id="duracion" name="duracion" value="<?= $row['duracion']?>" required>
            </div>

            <button type="submit" class="submit" name="guardar_servicio">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
    </div>
</body>

</html>