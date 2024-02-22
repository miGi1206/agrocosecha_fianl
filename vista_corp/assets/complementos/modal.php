<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="z-flex2">

                        <!-- inicio del formulario -->
                        <form method="POST" action="<?php  echo $_SERVER['PHP_SELF'];?>">
                            <img src="/agrocosecha_final/vista_corp/assets/img/logomaiz1.png" class="col-sm-6" id="ini_logo3"
                                style="margin-top: -14%">
                            <h5 class="modal-title" id="exampleModalToggleLabel"
                                style="margin-bottom: 5%; color: #065F2C;">Iniciar sesión</h5>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control cuadro_texto2" id="floatingInput" name="usuario"
                                    placeholder="usuario">
                                <label for="floatingInput">Usuario</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control cuadro_texto2" id="floatingInput" name="contraseña"
                                    placeholder="Contraseña">
                                <label for="floatingInput">Contraseña</label>
                            </div>
                            <div style="display:grid; grid-template-columns: repeat(1, 1fr);">
                                <button type="submit" class="btn-iniciar2" style="padding:1% 5%; margin-bottom:5%;">Iniciar sesión</button>
                                <button type="submit" class="btn-iniciar2" data-bs-toggle="modal" data-bs-target="#registro" data-bs-dismiss="modal" style="padding:1% 5%;">Registrarse</button>
                            </div>
                        </form>
                        <!-- fin del formulario  -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--registro-->
    <div class="modal fade" id="registro" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1"
        style=" overflow-y: auto;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- formulario de registro-->
                <div class="modal-body">
                    <form action="/agrocosecha_final/vista_corp/assets/controladores/cliente/registrar_usuario.php" method="POST"  onsubmit="return validarContraseña()">
                        <img src="/agrocosecha_final/vista_corp/assets/img/logomaiz1.png" id="ini_logo2"
                            style="margin-top: -1%; width: 35%; margin-left: 32%;">
                        <h5 style="margin-left: 40%; margin-bottom: 10%; color: #065F2C;">Registrate</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="identificacion"
                                        placeholder="identificacion" name="identificacion" required>
                                    <label for="identificacion">Identificación</label>
                                    <div id="result_identificacion" style="color:red; font-size:15px;"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="nombre"
                                        placeholder="nombre" name="nombre" required>
                                    <label for="nombre">Primer nombre</label>
                                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="nombre2"
                                        placeholder="nombre2" name="nombre2">
                                    <label for="nombre2">segundo nombre</label>
                                    <div id="result_nombre2" style="color:red; font-size:15px;"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="apellido"
                                        placeholder="apellido" name="apellido" required>
                                    <label for="apellido">Primer apellido</label>
                                    <div id="result_apellido" style="color:red; font-size:15px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="apellido2"
                                        placeholder="apellido2" name="apellido2">
                                    <label for="apellido2">segundo apellido</label>
                                    <div id="result_apellido2" style="color:red; font-size:15px;"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="telefono"
                                        placeholder="telefono" name="telefono" required>
                                    <label for="telefono">telefono</label>
                                    <div id="result_telefono" style="color:red; font-size:15px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="correo2"
                                        placeholder="correo" name="correo" required>
                                    <label for="correo">Correo</label>
                                </div>
                            </div>  
                                <!-- este es el combo box -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                <select id="sexo" name="sexo" class="form-select cuadro_texto2" aria-label="Seleccione el Sexo">
                                <!-- <option value="" disabled selected hidden></option> -->
                                        <?php
                                        // TODO: Consulta SQL para traer todos los datos de los administradores
                                        $sql_producto = "SELECT * FROM `tbl_sexo`";
                                        $result = mysqli_query($conn,$sql_producto);

                                        // Ciclo para mostrar los registros
                                        while ($row = mysqli_fetch_assoc($result)){
                                            echo "<option value='".$row['codigo_sexo']."'>".$row['sexo']."</option>"; 
                                        }
                                        ?>               
                                    </select>
                                    <label for="sexo">Sexo</label>
                                </div>
                            </div>
                                <!-- fin de combo box -->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control cuadro_texto2"
                                        id="fecha_nacimiento" placeholder="Fecha de nacimiento" name ="fecha_nacimiento" required>
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2"
                                        id="direccion" placeholder="Direccion" name ="direccion" required>
                                    <label for="direccion">Dirección</label>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2"
                                        id="usuario" placeholder="usuario" name ="usuario" required>
                                    <label for="usuario">Usuario</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                <input type="password" class="form-control cuadro_texto2" id="contraseña" placeholder="Contraseña" name="contraseña" required>
                                    <label for="contraseña">Contraseña</label>
                                    <div id="result_contraseña" style="color:red; font-size:15px;"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control cuadro_texto2" id="confirm_password" placeholder="Confirmar contraseña" name="confirm_password">
                                    <label for="confirm_password">Confirmar contraseña</label>
                                    <span class="error-message" id="error_message" style="color: red;  font-size: 15px; margin-left: 2% "></span>
                                    <span class="exelen" id="exelen" style="color: #065F2C;  font-size: 15px; margin-left: 2% "></span>
                                </div>
                            </div>
                        </div>
                        <script>
                            function validarContraseña() {
                                var password = document.getElementById("contraseña").value;
                                var confirm_password = document.getElementById("confirm_password").value;
                                var error_message = document.getElementById("error_message");
                                var exelen = document.getElementById("exelen");
                                if (password === "" || confirm_password === "") {
                                    error_message.textContent = "";
                                    exelen.textContent = "";
                                    return; // Salir de la función si los campos están vacíos
                                }
                                if (password !== confirm_password) {
                                    error_message.textContent = "Las contraseñas no coinciden.";
                                    exelen.textContent = "";
                                } else {
                                    error_message.textContent = ""; // Limpiar el mensaje de error si las contraseñas coinciden
                                    exelen.textContent = "Las contraseñas coinciden.";
                                }
                            }

                            // Asignar la función validarContraseña a los eventos oninput de los campos de contraseña
                            document.getElementById("contraseña").oninput = validarContraseña;
                            document.getElementById("confirm_password").oninput = validarContraseña;
                            
                        </script>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn-iniciar2" name="nuevo_registro">Registrarse</button>
                            </div>
                        </div>
                    </form>
                    <!--fin de formulario de registro-->
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <!--fin de registro-->
    
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

<!-- //! vadidacion para bloquear la tecla espacio en el campo de correo -->
<script>
    const correo2 = document.getElementById('correo2');

    correo2.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault();  // Evitar que se escriba el espacio
        }
    });
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