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
    <!-- <link rel="stylesheet" href="/agrocosecha_final/vista_corp/assets/css/formulario_registro.css"> -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>Agrocosecha</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
    <link rel="stylesheet" href="../../css/formulario_personas.css">
</head>
<body>

    <?php include "../../conections/coneccion_tabla.php"; ?>

    <!-- //! Formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar Persona</b></h3>
        </div>
        <form action="../../controladores/admin/registrar_admin.php" method="POST" >
            
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="identificacion" type="text" class="form-control cuadro_texto1" id="identificacion" placeholder="Identificacion" required maxlength="11">
                <label for="identificacion">Identificación:</label>
                <div id="result_identificacion" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:5% !important;">
                <label for="tipo_usuario" style="margin-top:-2%;">Tipo de usuario:</label>
                <select id="tipo_usuario" name="tipo_usuario" class="form-control cuadro_texto1">
                <?php
                
                //TODO: Consulta SQL para traer todos los datos de los administradores
                    $sql_sexo = "SELECT * FROM `tbl_tipo_usuario` WHERE tipo_usuario <> 'proveedor'";
                    $result_sexo = mysqli_query($conn,$sql_sexo);
                    
                    //* Ciclo para mostrar los registros
                    while ($row_sexo = mysqli_fetch_assoc($result_sexo)){
                        echo "<option value='".$row_sexo['codigo_tipo_usuario']."'>".$row_sexo['tipo_usuario']."</option>"; 
                    }?>               
                </select>
            </div>

            <hr>

            <div class="campos">
                <div class="form-floating mb-3 campo_intermedio" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="nombre" required maxlength="50">
                    <label for="nombre">Primer nombre:</label>
                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="nombre2" type="text" class="form-control cuadro_texto1" id="nombre2" placeholder="nombre2" maxlength="50">
                    <label for="nombre2">Segundo nombre: <span style="color:#065F2C;">*opcional*</span></label>
                    <div id="result_nombre2" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <div class="campos">
                <div class="form-floating mb-3 campo_intermedio" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="apellido" type="text" class="form-control cuadro_texto1" id="apellido" placeholder="apellido" required maxlength="50">
                    <label for="apellido">Primer apellido:</label>
                    <div id="result_apellido" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="apellido2" type="text" class="form-control cuadro_texto1" id="apellido2" placeholder="apellido2" maxlength="50">
                    <label for="apellido2">Segundo apellido:<span style="color:#065F2C;">*opcional*</span></label>
                    <div id="result_apellido2" style="color:red; font-size:15px;"></div>
                </div>
            </div>
            <div class="campos">
                
                <div class="form-floating mb-3 campo_intermedio" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="fecha_nacimiento" type="date" class="form-control cuadro_texto1" id="fecha_nacimiento" placeholder="fecha_nacimiento" required>
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
                </div>
                
                <div class="form-floating mb-3" style="margin-top:15px; ">
                    <label for="sexo" style="margin-top:-5%;">Sexo:</label>
                    <select id="sexo" name="sexo" class="form-control cuadro_texto1">
                    <?php
                    
                    //TODO: Consulta SQL para traer todos los datos de los administradores
                        $sql_sexo = "SELECT * FROM `tbl_sexo`";
                        $result_sexo = mysqli_query($conn,$sql_sexo);
                        
                        //* Ciclo para mostrar los registros
                        while ($row_sexo = mysqli_fetch_assoc($result_sexo)){
                            echo "<option value='".$row_sexo['codigo_sexo']."'>".$row_sexo['sexo']."</option>"; 
                        }?>               
                    </select>
                </div>
            </div>
            
            <div  class="campos">
                <div class="form-floating mb-3 campo_intermedio" style="margin-top:7px; margin-bottom:0px !important;">
                    <input name="correo" type="email" class="form-control cuadro_texto1" id="correo" placeholder="Correo" required maxlength="30">
                    <label for="correo">Correo electronico:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top: 3%;">
                    <input name="telefono" type="text" class="form-control cuadro_texto1" id="telefono" placeholder="telefono" required maxlength="15">
                    <label for="telefono">Telefono:</label>
                    <div id="result_telefono" style="color:red; font-size:15px;"></div>
                </div>
                
            </div>

            <hr>

            <div class="campos">

                <div class="form-floating mb-3 campo_intermedio" style="margin-top: 3%;"> 
                    <input name="direccion" type="text" class="form-control cuadro_texto1" id="direccion" placeholder="direccion" required maxlength="50">
                    <label for="direccion">Direccion:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top: 3%; ">
                    <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="Usuario" required maxlength="50">
                    <label for="usuario">usuario:</label>
                    <div id="result_usuario" style="color:red; font-size:15px;"></div>
                </div>
                
            </div>

            <div class="campos">
                <div class="form-floating mb-3 campo_intermedio" style="margin-top: 3%;">
                    <input name="contraseña" type="password" class="form-control cuadro_texto1" id="contraseña" placeholder="contraseña" required maxlength="50">
                    <label for="contraseña">Contraseña:</label>
                    <div id="result_contraseña" style="color:red; font-size:15px;"></div>
                </div>
                
                <!-- //TODO: aqui va el campo de confirmar contraseña -->
                
            </div>
            

            <button type="submit" class="submit" name="guardar_admin">Guardar</button>
        </form>
    </div>
    <!-- //! Fin formulario de registro del cliente -->


<!-- //! script para mostrar un mensaje de que no puede colocar letras -->
<script>
    const identificacion = document.getElementById('identificacion');
    const result_identificacion = document.getElementById('result_identificacion');

    let lastValidInputIdentificacion = ''; // Variable para almacenar la última entrada válida

    identificacion.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputIdentificacion(textValue)){
            identificacion.value = lastValidInputIdentificacion; // Restaurar el último valor válido
            return result_identificacion.innerHTML = `La identificacion solo puede contener números`;
        } else {
            lastValidInputIdentificacion = textValue; // Actualizar la última entrada válida
        }
        result_nit.innerHTML = '';
    });

    function isValidInputIdentificacion(text){
        // Verificar si la cadena solo contiene números y el carácter "-"
        return /^[0-9]*$/.test(text);
    }
</script>

    <!-- //! Validacion para solo letras y espacios en el campo del primer nombre -->
<script>
    const nombre = document.getElementById('nombre');
    const result_nombre = document.getElementById('result_nombre');

    let lastValidInputNombre = ''; // Variable para almacenar la última entrada válida

    nombre.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombre(textValue)){
            nombre.value = lastValidInputNombre; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombre = textValue; // Actualizar la última entrada válida
        }
        result_nombre.innerHTML = '';
    });

    function isValidInputNombre(text){
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ]*$/.test(text);
    }
</script>

    <!-- //! Validacion para solo letras y espacios en el campo de segundo nombre -->
    <script>
    const nombre2 = document.getElementById('nombre2');
    const result_nombre2 = document.getElementById('result_nombre2');

    let lastValidInputNombre2 = ''; // Variable para almacenar la última entrada válida

    nombre2.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombre2(textValue)){
            nombre2.value = lastValidInputNombre2; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre2.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombre2 = textValue; // Actualizar la última entrada válida
        }
        result_nombre2.innerHTML = '';
    });

    function isValidInputNombre2(text){
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ]*$/.test(text);
    }
</script>

    <!-- //! Validacion para solo letras y espacios en el campo de primer apellido -->
<script>
    const apellido = document.getElementById('apellido');
    const result_apellido = document.getElementById('result_apellido');

    let lastValidInputApellido = ''; // Variable para almacenar la última entrada válida

    apellido.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputApellido(textValue)){
            apellido.value = lastValidInputApellido; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_apellido.innerHTML = `El apellido no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputApellido = textValue; // Actualizar la última entrada válida
        }
        result_apellido.innerHTML = '';
    });

    function isValidInputApellido(text){
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ]*$/.test(text);
    }
</script>

    <!-- //! Validacion para solo letras y espacios en el campo de segundo apellido -->
<script>
    const apellido2 = document.getElementById('apellido2');
    const result_apellido2 = document.getElementById('result_apellido2');

    let lastValidInputApellido2 = ''; // Variable para almacenar la última entrada válida

    apellido2.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputApellido2(textValue)){
            apellido2.value = lastValidInputApellido2; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_apellido2.innerHTML = `El apellido no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputApellido2 = textValue; // Actualizar la última entrada válida
        }
        result_apellido2.innerHTML = '';
    });

    function isValidInputApellido2(text){
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ]*$/.test(text);
    }
</script>

<!-- //! vadidacion para bloquear la tecla espacio en el campo de correo -->
<script>
    const correo = document.getElementById('correo');

    correo.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault();  // Evitar que se escriba el espacio
        }
    });
</script>

    <!-- //! Validacion para solo numeros en el campo del telefono -->
<script>
    const telefono = document.getElementById('telefono');
    const result_telefono = document.getElementById('result_telefono');

    let lastValidInputTelefono = ''; // Variable para almacenar la última entrada válida

    telefono.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputTelefono(textValue)){
            telefono.value = lastValidInputTelefono; // Restaurar el último valor válido
            return result_telefono.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputTelefono = textValue; // Actualizar la última entrada válida
        }
        result_telefono.innerHTML = '';
    });

    function isValidInputTelefono(text){
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
</script>

<!-- //! vadidacion para bloquear la tecla espacio en el campo de usuario -->
<script>
    const usuario = document.getElementById('usuario');
    const result_usuario = document.getElementById('result_usuario');

    usuario.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidTextUsuario(textValue)){
            result_usuario.innerHTML = `Máximo 50 caracteres alfanuméricos`;
        } else {
            result_usuario.innerHTML = '';
        }
    });

    usuario.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault();  // Evitar que se escriba el espacio
        }
    });

    function isValidTextUsuario(text){
        const maxLength = 50;

        // Permitir letras y números
        return /^[A-Za-z0-9\s]*$/.test(text) && text.length <= maxLength;
    }
</script>

<!-- //! vadidacion para bloquear la tecla espacio en el campo de contraseña y ponerle un min y max de los caracteres-->
<script>
    const contraseña = document.getElementById('contraseña');
    const result_contraseña = document.getElementById('result_contraseña');
    const caracter_minimo = 6;
    const caracter_maximo = 50;

    contraseña.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (textValue.length < caracter_minimo || textValue.length > caracter_maximo){
            result_contraseña.innerHTML = `Entre 6 y 50 caracteres`;
        } else {
            result_contraseña.innerHTML = '';
        }
    });

    contraseña.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault();  // Evitar que se escriba el espacio
        }
    });
</script>

</body>
</html>
