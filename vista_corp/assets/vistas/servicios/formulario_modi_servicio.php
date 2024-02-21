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
                <input name="codigo_servicio" type="number" class="form-control cuadro_texto1" id="codigo_servicio" placeholder="codigo_servicio" value="<?= $row['codigo_servicio']?>" readonly required>
                <label for="codigo_servicio">Codigo:</label>
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
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre"  maxlength="30" value="<?= $row['nombre']?>" required>
                <label for="nombre">Nombre:</label>
                <div id="result_nombre" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required><?= $row['descripcion']?></textarea>
            </div>
            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-right: 5% !important;">
                    <input name="precio" type="text" class="form-control cuadro_texto1" id="precio" placeholder="precio" value="<?= $row['precio']?>" required maxlength="15">
                    <label for="precio">Precio:</label>
                    <div id="result_precio" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="duracion" type="text" class="form-control cuadro_texto1" id="duracion" placeholder="duracion" value="<?= $row['duracion']?>"  required maxlength="2">
                    <label for="duracion">Duracion por hora:</label>
                    <div id="result_duracion" style="color:red; font-size:15px;"></div>
                </div>
            </div>
            <button type="submit" class="submit" name="guardar_servicio">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
    </div>

    <script>
    const nombre = document.getElementById('nombre');
    const result_nombre = document.getElementById('result_nombre');

    let lastValidInput = ''; // Variable para almacenar la última entrada válida

    nombre.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInput(textValue)){
            nombre.value = lastValidInput; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInput = textValue; // Actualizar la última entrada válida
        }
        result_nombre.innerHTML = '';
    });

    function isValidInput(text){
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ\s]*$/.test(text);
    }
</script>

   <!-- //! Validacion para solo numeros en el campo del precio -->
<script>
    const precio = document.getElementById('precio');
    const result_precio = document.getElementById('result_precio');

    let lastValidInputprecio = ''; // Variable para almacenar la última entrada válida

    precio.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputPrecio(textValue)){
            precio.value = lastValidInputprecio; // Restaurar el último valor válido
            return result_precio.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputprecio = textValue; // Actualizar la última entrada válida
        }
        result_precio.innerHTML = '';
    });

    function isValidInputPrecio(text){
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
</script>

</script>

    <!-- //! Validacion para solo numeros en el campo de duracion-->
    <script>
    const duracion = document.getElementById('duracion');
    const result_duracion = document.getElementById('result_duracion');

    let lastValidInputduracion = ''; // Variable para almacenar la última entrada válida

    duracion.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputduracion(textValue)){
            duracion.value = lastValidInputduracion; // Restaurar el último valor válido
            return result_duracion.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputduracion = textValue; // Actualizar la última entrada válida
        }
        result_duracion.innerHTML = '';
    });

    function isValidInputduracion(text){
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
</script>

</body>
</html>