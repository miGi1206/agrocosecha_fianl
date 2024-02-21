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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>
<body>

    <?php include "../../conections/coneccion_tabla.php";?>

    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar servicio</b></h3>
        </div>
        <form action="../../controladores/servicio/registrar_servicio.php" method="POST" >
        
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="codigo_servicio" type="text" class="form-control cuadro_texto1" id="codigo_servicio" placeholder="Código" required  maxlength="11">
                <label for="codigo_servicio">Código:</label>
                <div id="result_codigo_servicio" style="color:red; font-size:15px;"></div>
            </div>


            <div class="form-group">
                <label for="tipo">Tipo de servicio:</label>
                <select id="tipo" name="tipo">
                <?php
                
                //TODO: Consulta SQL para traer todos los datos de los administradores
                    $sql_tipo_servicio = "SELECT * FROM `tbl_tipo_servicio`";
                    $result = mysqli_query($conn,$sql_tipo_servicio);
                    

                    //* Ciclo para mostrar los registros
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row['codigo_tipo_servicio']."'>".$row['tipo_servicio']."</option>"; 
                    }?>               
                </select>
            </div>

            <div class="form-floating mb-3" style="margin-bottom:15px !important; margin-top:15px;">
                <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="Nombre" maxlength="30" required>
                <label for="nombre">Nombre:</label>
                <div id="result_nombre" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px;  margin-right: 5% !important;">
                    <input name="precio" type="text" class="form-control cuadro_texto1" id="precio" placeholder="precio" required  maxlength="15">
                    <label for="precio">Precio:</label>
                    <div id="result_precio" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input name="duracion" type="text" class="form-control cuadro_texto1" id="duracion" placeholder="duracion" required maxlength="2">
                    <label for="duracion">Duracion por hora:</label>
                    <div id="result_duracion" style="color:red; font-size:15px;"></div>
                </div>  
            </div>             
            <button type="submit" class="submit" name="guardar_servicio">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</div>

    <!-- //! Validacion para solo numeros en el campo del codigo -->
    <script>
    const codigo_servicio = document.getElementById('codigo_servicio');
    const result_codigo_servicio = document.getElementById('result_codigo_servicio');

    let lastValidInputCodigoservicio = ''; // Variable para almacenar la última entrada válida

    codigo_servicio.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputCodigoservicio(textValue)){
            codigo_servicio.value = lastValidInputCodigoservicio; // Restaurar el último valor válido
            return result_codigo_servicio.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputCodigoservicio = textValue; // Actualizar la última entrada válida
        }
        result_codigo_servicio.innerHTML = '';
    });

    function isValidInputCodigoservicio(text){
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
</script>

<!-- //! script para mostrar un mensaje de nombre no puede ser guardado -->
<script>
    const nombre = document.getElementById('nombre');
    const result_nombre = document.getElementById('result_nombre');

    let lastValidInput = ''; // Variable para almacenar la última entrada válida

    nombre.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombre(textValue)){
            nombre.value = lastValidInput; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInput = textValue; // Actualizar la última entrada válida
        }
        result_nombre.innerHTML = '';
    });

    function isValidInputNombre(text){
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
