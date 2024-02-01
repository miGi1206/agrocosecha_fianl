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
                                <input type="password" class="form-control cuadro_texto2" id="floatingInput" name="password"
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
                    <form action="./vista_corp/assets/controladores/cliente/registrar_usuario.php" method="POST"  onsubmit="return validarContraseña()">
                        <img src="/agrocosecha_final/vista_corp/assets/img/logomaiz1.png" id="ini_logo2"
                            style="margin-top: -1%; width: 35%; margin-left: 32%;">
                        <h5 style="margin-left: 40%; margin-bottom: 10%; color: #065F2C;">Registrate</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control cuadro_texto2" id="floatingInputNombre"
                                        placeholder="identificacion" name="identificacion">
                                    <label for="floatingInputNombre">Identificación</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="floatingInputApellidos"
                                        placeholder="nombre" name="nombre">
                                    <label for="floatingInputApellidos">Nombre</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2"
                                        id="floatingInputIdentificacion" placeholder="usuario" name ="usuario">
                                    <label for="floatingInputIdentificacion">Usuario</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="floatingInputTelefono"
                                        placeholder="correo" name="correo">
                                    <label for="floatingInputTelefono">Correo</label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                <input type="password" class="form-control cuadro_texto2" id="contraseña" placeholder="Contraseña" name="contraseña">
                                    <label for="contraseña">Contraseña</label>
                                </div>
                            </div>
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