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
    <!--//TODO: formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar proveedor</b></h3>
        </div>
        <form action="../../controladores/proveedor/registrar_proveedor.php" method="POST" >
        
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="nit" type="text" class="form-control cuadro_texto1" id="nit" placeholder="nit" required maxlength="15">
                <label for="nit">NIT:</label>
                <div id="result_nit" style="color:red; font-size:15px;"></div>
            </div>

            <div class="form-floating mb-3" style="margin-bottom:0px !important; margin-top:15px;">
                <input name="nombre_razonsocial" type="text" class="form-control cuadro_texto1" id="nombre_razonsocial" placeholder="nombre_razonsocial" required maxlength="100">
                <label for="nombre_razonsocial">Nombre o razon social:</label>
                <div id="result_nombre_razonsocial" style="color:red; font-size:15px;"></div>
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-right: 5% !important;">
                    <input name="telefono_empresarial" type="text" class="form-control cuadro_texto1" id="telefono_empresarial" placeholder="telefono_empresarial" required maxlength="15">
                    <label for="telefono_empresarial">Telefono empresarial:</label>
                    <div id="result_telefono_empresarial" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input name="correo_empresarial" type="email" class="form-control cuadro_texto1" id="correo_empresarial" placeholder="correo_empresarial" required maxlength="50">
                    <label for="correo_empresarial">Correo empresarial:</label> 
                </div>
            </div>
            <hr>

            <div class="form-floating mb-3" style="margin-bottom:0px !important; margin-top:6%;">
                <input name="nombre_contacto" type="text" class="form-control cuadro_texto1" id="nombre_contacto" placeholder="Nombre_contacto" required maxlength="30">
                <label for="nombre_contacto">Persona de contacto:</label>
                <div id="result_nombre_contacto" style="color:red; font-size:15px;"></div>
            </div>
            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-right: 5% !important;">
                    <input name="telefono_contacto" type="text" class="form-control cuadro_texto1" id="telefono_contacto" placeholder="telefono_contacto" required maxlength="15">
                    <label for="telefono_contacto">Telefono personal:</label>
                    <div id="result_telefono_contacto" syle="color:red !important; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input name="correo_contacto" type="email" class="form-control cuadro_texto1" id="correo_contacto" placeholder="correo_contacto" required maxlength="50">
                    <label for="correo_contacto">Correo personal:</label> 
                </div>
            </div>

            <hr>

            <div class="form-floating mb-3" style="margin-top: 3%; ">
                <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="Usuario" required maxlength="50">
                <label for="usuario">usuario:</label>
                <div id="result_usuario" style="color:red; font-size:15px;"></div>
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top: 3%; margin-right: 5% !important;">
                    <input name="contraseña" type="password" class="form-control cuadro_texto1" id="contraseña" placeholder="contraseña" required maxlength="50">
                    <label for="contraseña">Contraseña:</label>
                    <div id="result_contraseña" style="color:red; font-size:15px;"></div>
                </div>
                
                <!-- //TODO: aqui va el campo de confirmar contraseña -->
                
            </div>

            <button type="submit" class="submit" name="guardar_proveedor">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</div>


<!-- //! script para mostrar un mensaje de que no puede colocar letras -->
<script>
    const nit = document.getElementById('nit');
    const result_nit = document.getElementById('result_nit');

    let lastValidInputNit = ''; // Variable para almacenar la última entrada válida

    nit.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNit(textValue)){
            nit.value = lastValidInputNit; // Restaurar el último valor válido
            return result_nit.innerHTML = `El NIT solo puede contener números y el carácter "-"`;
        } else {
            lastValidInputNit = textValue; // Actualizar la última entrada válida
        }
        result_nit.innerHTML = '';
    });

    function isValidInputNit(text){
        // Verificar si la cadena solo contiene números y el carácter "-"
        return /^[0-9-]*$/.test(text);
    }
</script>

<!-- //! script para mostrar un mensaje de nombre de la empresa no puede ser guardado -->
<script>
    const nombre_razonsocial = document.getElementById('nombre_razonsocial');
    const result_nombre_razonsocial = document.getElementById('result_nombre_razonsocial');

    let lastValidInputNombreRazonsocial = ''; // Variable para almacenar la última entrada válida

    nombre_razonsocial.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombreRazonsocial(textValue)){
            nombre_razonsocial.value = lastValidInputNombreRazonsocial; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre_razonsocial.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombreRazonsocial = textValue; // Actualizar la última entrada válida
        }
        result_nombre_razonsocial.innerHTML = '';
    });

    function isValidInputNombreRazonsocial(text){
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ\s]*$/.test(text);
    }
</script>

    <!-- //! Validacion para solo numeros en el campo del telefono empresarial -->
    <script>
    const telefono_empresarial = document.getElementById('telefono_empresarial');
    const result_telefono_empresarial = document.getElementById('result_telefono_empresarial');

    let lastValidInputTelefonoEmpresarial = ''; // Variable para almacenar la última entrada válida

    telefono_empresarial.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputTelefonoEmpresarial(textValue)){
            telefono_empresarial.value = lastValidInputTelefonoEmpresarial; // Restaurar el último valor válido
            return result_telefono_empresarial.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputTelefonoEmpresarial = textValue; // Actualizar la última entrada válida
        }
        result_telefono_empresarial.innerHTML = '';
    });

    function isValidInputTelefonoEmpresarial(text){
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
</script>

<!-- //! vadidacion para bloquear la tecla espacio en el campo de correo empresarial -->
<script>
    const correo_empresarial = document.getElementById('correo_empresarial');

    correo_empresarial.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault();  // Evitar que se escriba el espacio
        }
    });
</script>

<!-- //! script para mostrar un mensaje de nombre personal no puede ser guardado -->
<script>
    const nombre_contacto = document.getElementById('nombre_contacto');
    const result_nombre_contacto = document.getElementById('result_nombre_contacto');

    let lastValidInputNombreContacto = ''; // Variable para almacenar la última entrada válida

    nombre_contacto.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombreContacto(textValue)){
            nombre_contacto.value = lastValidInputNombreContacto; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre_contacto.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombreContacto = textValue; // Actualizar la última entrada válida
        }
        result_nombre_contacto.innerHTML = '';
    });

    function isValidInputNombreContacto(text){
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ\s]*$/.test(text);
    }
</script>

    <!-- //! Validacion para solo numeros en el campo del telefono persona -->
    <script>
    const telefono_contacto = document.getElementById('telefono_contacto');
    const result_telefono_contacto = document.getElementById('result_telefono_contacto');

    let lastValidInputTelefonoContacto = ''; // Variable para almacenar la última entrada válida

    telefono_contacto.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputTelefonoContacto(textValue)){
            telefono_contacto.value = lastValidInputTelefonoContacto; // Restaurar el último valor válido
            return result_telefono_contacto.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputTelefonoContacto = textValue; // Actualizar la última entrada válida
        }
        result_telefono_contacto.innerHTML = '';
    });

    function isValidInputTelefonoContacto(text){
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
</script>

<!-- //! vadidacion para bloquear la tecla espacio en el campo de correo personal -->
<script>
    const correo_contacto = document.getElementById('correo_contacto');

    correo_contacto.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault();  // Evitar que se escriba el espacio
        }
    });
</script>

<!-- //! vadidacion para bloquear la tecla espacio en el campo de usuario -->
<script>
    const sqlStatement = "SELECT usuario FROM tbl_usuario";

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
    const caracter_maximo = 20;

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
