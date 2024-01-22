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
                            <button type="submit" class="btn-iniciar2">Iniciar sesión</button>
                            <button type="submit" class="btn-iniciar2" data-bs-toggle="modal" data-bs-target="#registro" data-bs-dismiss="modal">Registrarse</button>
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
                    <form action="./vista_corp/assets/controladores/cliente/registrar_usuario.php" method="POST">
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
                                    <input type="password" class="form-control cuadro_texto2" id="floatingInputCiudad"
                                        placeholder="Contraseña" name="contraseña">
                                    <label for="floatingInputCiudad">Contraseña</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
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
                                <button type="submit" class="btn-iniciar2" name="nuevo_registro">Registrase</button>
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