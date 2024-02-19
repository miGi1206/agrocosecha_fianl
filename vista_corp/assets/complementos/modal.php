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
                                    <input type="number" class="form-control cuadro_texto2" id="floatingInputidentificacion"
                                        placeholder="identificacion" name="identificacion">
                                    <label for="floatingInputNombre">Identificación</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="floatingInputprimernombre"
                                        placeholder="primer nombre" name="primer_nombre">
                                    <label for="floatingInputApellidos">Primer nombre</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="floatingInputsegundoNombre"
                                        placeholder="segundo nombre" name="segundo_nombre">
                                    <label for="floatingInputNombre">segundo nombre</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="floatingInputprimerapellido"
                                        placeholder="primer apellido" name="primer_apellido">
                                    <label for="floatingInputApellidos">Primer apellido</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="floatingInputsegundoapellido"
                                        placeholder="segundo apellido" name="segundo_apellido">
                                    <label for="floatingInputNombre">segundo apellido</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control cuadro_texto2" id="floatingInputtelefo"
                                        placeholder="telefono" name="telefono">
                                    <label for="floatingInputApellidos">telefono</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2" id="floatingInputcorreo"
                                        placeholder="correo" name="correo">
                                    <label for="floatingInputTelefono">Correo</label>
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
                                        id="floatingInputIdentificacion" placeholder="Fecha de nacimiento" name ="fecha_nacimiento">
                                    <label for="floatingInputfechanacimiento">Fecha de nacimiento</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2"
                                        id="floatingInputdireccion" placeholder="Direccion" name ="direccion">
                                    <label for="floatingInputfechanacimiento">Dirección</label>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control cuadro_texto2"
                                        id="floatingInputIdentificacion" placeholder="usuario" name ="usuario">
                                    <label for="floatingInputusuario">Usuario</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                <input type="password" class="form-control cuadro_texto2" id="contraseña" placeholder="Contraseña" name="contraseña">
                                    <label for="contraseña">Contraseña</label>
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