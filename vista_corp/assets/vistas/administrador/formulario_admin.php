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
    <title>Agrocosecha</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>
<body>

    <?php include "../../conections/coneccion_tabla.php"; ?>

    <!-- //! Formulario de registro de cliente -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>Registrar administrador</b></h3>
        </div>
        <form action="../../controladores/admin/registrar_admin.php" method="POST" >
            
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="identificacion" type="number" class="form-control cuadro_texto1" id="floatingInputidentificacion" placeholder="Identificacion" requered>
                <label for="floatingInputidentificacion">Identificación:</label>
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="nombre" requered>
                    <label for="nombre">Primer nombre:</label>
                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="nombre2" type="text" class="form-control cuadro_texto1" id="nombre2" placeholder="nombre2" requered>
                    <label for="nombre2">Segundo nombre:</label>
                    <div id="result_nombre2" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="apellido" type="text" class="form-control cuadro_texto1" id="apellido" placeholder="apellido" requered>
                    <label for="apellido">Primer apellido:</label>
                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="apellido2" type="text" class="form-control cuadro_texto1" id="apellido2" placeholder="apellido2" requered>
                    <label for="apellido2">Segundo apellido:</label>
                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                </div>
            </div>
            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="fecha_nacimiento" type="date" class="form-control cuadro_texto1" id="fecha_nacimiento" placeholder="fecha_nacimiento" requered>
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
            
            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:7px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="correo" type="email" class="form-control cuadro_texto1" id="correo" placeholder="Correo" requered>
                    <label for="correo">Correo electronico:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top: 3%;">
                    <input name="telefono" type="number" class="form-control cuadro_texto1" id="telefono" placeholder="telefono" requered>
                    <label for="telefono">Telefono:</label>
                    <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
                </div>
                
            </div>

            <hr>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">

                <div class="form-floating mb-3" style="margin-top: 3%; margin-right: 5% !important;">
                    <input name="direccion" type="text" class="form-control cuadro_texto1" id="direccion" placeholder="direccion" requered>
                    <label for="direccion">Direccion:</label>
                    <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
                </div>

                <div class="form-floating mb-3" style="margin-top: 3%; ">
                    <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="Usuario" requered>
                    <label for="usuario">usuario:</label>
                    <div id="result_usuario" style="color:red; font-size:15px;"></div>
                </div>
                
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top: 3%; margin-right: 5% !important;">
                    <input name="contraseña" type="password" class="form-control cuadro_texto1" id="contraseña" placeholder="contraseña" requered>
                    <label for="contraseña">Contraseña:</label>
                    <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
                </div>
                
                <!-- //TODO: aqui va el campo de confirmar contraseña -->
                
            </div>
            

            <button type="submit" class="submit" name="guardar_admin">Guardar</button>
        </form>
    </div>
    <!-- //! Fin formulario de registro del cliente -->
</div>

<script src="../../js/validaciones.js"></script>
</body>
</html>
