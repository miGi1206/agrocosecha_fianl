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
    $sql = "SELECT tbl_servicio.codigo_servicio, tbl_servicio.nombre, tbl_servicio.descripcion,tbl_servicio.precio,
    tbl_servicio.precio, tbl_servicio.duracion, tbl_tipo_servicio.tipo_servicio, tbl_tipo_servicio.codigo_tipo_servicio, tbl_servicio.cod_tipo_servicio
    FROM tbl_servicio
    JOIN tbl_tipo_servicio ON tbl_servicio.cod_tipo_servicio  = tbl_tipo_servicio.codigo_tipo_servicio
    WHERE tbl_servicio.codigo_servicio = '$id'";
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>

<body>
    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Modificar servicio</b></h3>
        </div>
        <form action="../../controladores/servicio/modificar_servicio.php" method="POST">
            
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="codigo_servicio" type="number" class="form-control cuadro_texto1" id="floatingInputcodigo_servicio" placeholder="codigo_servicio" value="<?= $row['codigo_servicio']?>" readonly requered>
                <label for="floatingInputcodigo_servicio">Codigo:</label>
            </div>

            <label for="floatingInputipo">Tipo de servicio:</label>
            <div class="form-group">
                <select id="tipo" name="tipo">
                    <?php
                    // Almacena el valor actual en una variable antes del bucle
                    $valorActual = $row['codigo_tipo_servicio'];
                    $valorActual2 = $row['tipo_servicio'];

                    // Muestra el valor actual como la primera opción
                    echo "<option value='$valorActual'>$valorActual2</option>";

                    // Consulta SQL para traer todos los datos de los tipos de servicio
                    $sql_tipo_servicio = "SELECT codigo_tipo_servicio, tipo_servicio FROM `tbl_tipo_servicio`";
                    $result = mysqli_query($conn, $sql_tipo_servicio);

                    // Ciclo para mostrar los registros
                    while ($row2 = mysqli_fetch_assoc($result)) {
                        // Verifica que el valor no sea igual al valor actual
                        if ($row2['codigo_tipo_servicio'] != $valorActual) {
                            echo "<option value='" . $row2['codigo_tipo_servicio'] . "'>" . $row2['tipo_servicio'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:15px !important;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" value="<?= $row['nombre']?>" requered>
                <label for="nombre">Nombre:</label>
                <div id="result_nombre" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required><?= $row['descripcion']?></textarea>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="precio" type="number" class="form-control cuadro_texto1" id="floatingInputprecio" placeholder="precio" value="<?= $row['precio']?>" requered>
                <label for="floatingInputprecio">Precio:</label>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="duracion" type="number" class="form-control cuadro_texto1" id="floatingInputduracion" placeholder="duracion" value="<?= $row['duracion']?>" requered>
                <label for="floatingInputduracion">Duracion por hora:</label>
            </div>

            <button type="submit" class="submit" name="guardar_servicio">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
    </div>

    <script src="../../js/validaciones.js"></script>
</body>

</html>