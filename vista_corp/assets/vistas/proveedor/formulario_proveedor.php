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
                <input name="nit" type="text" class="form-control cuadro_texto1" id="nit" placeholder="nit" requered>
                <label for="nit">NIT:</label>
            </div>

            <div class="form-floating mb-3" style="margin-bottom:0px !important; margin-top:15px;">
                <input name="nombre_razonsocial" type="text" class="form-control cuadro_texto1" id="nombre_razonsocial" placeholder="nombre_razonsocial" requered>
                <label for="nombre_razonsocial">Nombre o razon social:</label>
                <!-- <div id="result_nombre" style="color:red; font-size:15px;"></div> -->
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-right: 5% !important;">
                    <input name="telefono_empresarial" type="number" class="form-control cuadro_texto1" id="telefono_empresarial" placeholder="telefono_empresarial" requered>
                    <label for="telefono_empresarial">Telefono empresarial:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input name="correo_empresarial" type="email" class="form-control cuadro_texto1" id="correo_empresarial" placeholder="correo_empresarial" requered>
                    <label for="correo_empresarial">Correo empresarial:</label> 
                </div>
            </div>
            <hr>

            <div class="form-floating mb-3" style="margin-bottom:0px !important; margin-top:6%;">
                <input name="nombre_contacto" type="text" class="form-control cuadro_texto1" id="nombre_contacto" placeholder="Nombre_contacto" requered>
                <label for="nombre_contacto">Persona de contacto:</label>
                <!-- <div id="result_nombre" style="color:red; font-size:15px;"></div> -->
            </div>
            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-right: 5% !important;">
                    <input name="telefono_contacto" type="number" class="form-control cuadro_texto1" id="telefono_contacto" placeholder="telefono_contacto" requered>
                    <label for="telefono_contacto">Telefono personal:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px;">
                    <input name="correo_contacto" type="email" class="form-control cuadro_texto1" id="correo_contacto" placeholder="correo_contacto" requered>
                    <label for="correo_contacto">Correo personal:</label> 
                </div>
            </div>

            <hr>

            <div class="form-floating mb-3" style="margin-top: 3%; ">
                <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="Usuario" requered>
                <label for="usuario">usuario:</label>
                <div id="result_usuario" style="color:red; font-size:15px;"></div>
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top: 3%; margin-right: 5% !important;">
                    <input name="contraseña" type="password" class="form-control cuadro_texto1" id="contraseña" placeholder="contraseña" requered>
                    <label for="contraseña">Contraseña:</label>
                    <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
                </div>
                
                <!-- //TODO: aqui va el campo de confirmar contraseña -->
                
            </div>

            <button type="submit" class="submit" name="guardar_proveedor">Guardar</button>
        </form>
    </div>
    <!--//TODO: Fin formulario de registro del cliente -->
</div>
<script src="../../js/validaciones.js"></script>
</body>
</html>
