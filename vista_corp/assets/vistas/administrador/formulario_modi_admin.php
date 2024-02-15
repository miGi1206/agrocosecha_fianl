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
    $sql = "SELECT tbl_persona.codigo_persona, tbl_persona.identificacion, tbl_persona.primer_nombre, tbl_persona.segundo_nombre,
                tbl_persona.primer_apellido, tbl_persona.segundo_apellido, tbl_persona.telefono, tbl_persona.correo,
                tbl_sexo.codigo_sexo, tbl_sexo.sexo, tbl_persona.fecha_nacimiento, tbl_persona.direccion, tbl_usuario.usuario
                FROM `tbl_persona`
                JOIN `tbl_usuario` ON tbl_persona.codigo_persona = tbl_usuario.cod_persona
                JOIN `tbl_sexo` ON tbl_persona.cod_sexo = tbl_sexo.codigo_sexo
                JOIN `tbl_tipo_usuario` ON tbl_usuario.cod_tipo_usuario = tbl_tipo_usuario.codigo_tipo_usuario
                WHERE tbl_tipo_usuario.codigo_tipo_usuario = 1 AND tbl_persona.identificacion = '$id'";
    // $sql="SELECT * FROM tbl_admin WHERE `tbl_admin`.`id`='$id'";
    $query=mysqli_query($conn, $sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrocosecha</title>
    <link rel="stylesheet" href="../../../assets/css/formulario_admin.css ">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>
<body>
    <!-- //TODO: Formulario para modificar al admin; el formulario se muestra con la informacion de la base de datos -->
    <div id="form-container">
        <div class="contenedor">
            <div id="productos">
                <h1 class="text-success"><b>Modificar administrador</b></h1>
            </div> 
        <form action="../../controladores/admin/modificar_admin.php" method="POST">
            
            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="identificacion" type="number" class="form-control cuadro_texto1" id="floatingInputidentificacion" placeholder="Identificacion" value="<?= $row['identificacion']?>" readonly requered>
                <label for="floatingInputidentificacion">Identificación:</label>
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="nombre" value="<?= $row['primer_nombre']?>" requered>
                    <label for="nombre">Primer nombre:</label>
                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="nombre2" type="text" class="form-control cuadro_texto1" id="nombre2" placeholder="nombre2" value="<?= $row['segundo_nombre']?>" requered>
                    <label for="nombre2">Segundo nombre:</label>
                    <div id="result_nombre2" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="apellido" type="text" class="form-control cuadro_texto1" id="apellido" placeholder="apellido" value="<?= $row['primer_apellido']?>" requered>
                    <label for="apellido">Primer apellido:</label>
                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="apellido2" type="text" class="form-control cuadro_texto1" id="apellido2" placeholder="apellido2" value="<?= $row['segundo_apellido']?>" requered>
                    <label for="apellido2">Segundo apellido:</label>
                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="fecha_nacimiento" type="date" class="form-control cuadro_texto1" id="fecha_nacimiento" placeholder="fecha_nacimiento" value="<?= $row['fecha_nacimiento']?>" requered>
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
                </div>
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:5% !important;">
                    <label for="floatingInputipo" style="margin-top:-5% !important;">Sexo:</label>
                    <select id="sexo" name="sexo" class="form-control cuadro_texto1" style="cursor:pointer;" placeholder="Sexo" >
                        <?php
                        // Almacena el valor actual en una variable antes del bucle
                        $valorActual = $row['codigo_sexo'];
                        $valorActual2 = $row['sexo'];

                        // Muestra el valor actual como la primera opción
                        echo "<option value='$valorActual'>$valorActual2</option>";

                        // Consulta SQL para traer todos los datos de los tipos de servicio
                        $sql_tipo_servicio = "SELECT codigo_sexo, sexo FROM `tbl_sexo`";
                        $result = mysqli_query($conn, $sql_tipo_servicio);

                        // Ciclo para mostrar los registros
                        while ($row2 = mysqli_fetch_assoc($result)) {
                            // Verifica que el valor no sea igual al valor actual
                            if ($row2['codigo_sexo'] != $valorActual) {
                                echo "<option value='" . $row2['codigo_sexo'] . "'>" . $row2['sexo'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <hr>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="correo" type="email" class="form-control cuadro_texto1" id="correo" placeholder="Correo" value="<?= $row['correo']?>" requered>
                    <label for="correo">Correo electronico:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:5% !important;">
                    <input name="telefono" type="number" class="form-control cuadro_texto1" id="telefono" placeholder="telefono" value="<?= $row['telefono']?>" requered>
                    <label for="telefono">Telefono:</label>
                    <!-- <div id="result_nombre" style="color:red; font-size:15px;"></div> -->
                </div>
            </div>
            
            
            <div style="display:grid; grid-template-columns: repeat(2,1fr); margin-bottom:5%;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="direccion" type="text" class="form-control cuadro_texto1" id="direccion" placeholder="direccion" value="<?= $row['direccion']?>" requered>
                    <label for="direccion">Dirección:</label>
                    <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="usuario" value="<?= $row['usuario']?>" requered>
                    <label for="usuario">Usuario:</label>
                    <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
                </div>
            </div>
            
            <button type="submit" name="sumit">Actualizar</button>
        </form>
    </div>
</div>
<script src="../../js/validaciones.js"></script>
</body>
</html>
