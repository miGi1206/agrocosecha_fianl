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
    $nit=$_GET["nit"];
    $sql="SELECT tbl_proveedor.nit, tbl_proveedor.nombre_razonsocial, tbl_proveedor.telefono, tbl_proveedor.correo,
    tbl_proveedor.nom_per_contacto, tbl_proveedor.tel_contacto, tbl_proveedor.correo_contacto, tbl_usuario.usuario
    FROM `tbl_proveedor`
    JOIN `tbl_usuario` ON tbl_proveedor.nit = tbl_usuario.nit_proveedor AND tbl_proveedor.nit = '$nit'";
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
                <h1 class="text-siccess" style="color: #065F2C;"><b>Modificar proveedor</b></h1>
            </div> 
        <form action="../../controladores/proveedor/modificar_proveedor.php" method="POST">

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="nit" type="text" class="form-control cuadro_texto1" id="nit" placeholder="nit" value="<?= $row['nit']?>" readonly requered>
                <label for="nit">NIT:</label>
            </div>

            <div class="form-floating mb-3" style="margin-top:5%; margin-bottom:5% !important;">
                <input name="nombre_empresarial" type="text" class="form-control cuadro_texto1" id="nombre_empresarial" placeholder="nombre_empresarial" value="<?= $row['nombre_razonsocial']?>" requered>
                <label for="nombre_empresarial">Nombre o razon social:</label>
                <!-- <div id="result_nombre" style="color:red; font-size:15px;"></div> -->
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="telefono_empresarial" type="number" class="form-control cuadro_texto1" id="telefono_empresarial" placeholder="telefono_empresarial" value="<?= $row['telefono']?>" requered>
                    <label for="telefono_empresarial">Telefono empresarial:</label>
                    <!-- <div id="result_nombre" style="color:red; font-size:15px;"></div> -->
                </div>

                <div class="form-floating mb-3" style=" margin-bottom:5% !important;">
                    <input name="correo_empresarial" type="email" class="form-control cuadro_texto1" id="correo_empresarial" placeholder="correo_empresarial" value="<?= $row['correo']?>" requered>
                    <label for="correo_empresarial">Correo empresarial:</label>
                    <!-- <div id="result_nombre2" style="color:red; font-size:15px;"></div> -->
                </div>
            </div>

            <hr>

            <div class="form-floating mb-3" style="margin-top: 5%;">
                <input name="nombre_contacto" type="text" class="form-control cuadro_texto1" id="nombre_contacto" placeholder="nombre_contacto" value="<?= $row['nom_per_contacto']?>" requered>
                <label for="nombre_contacto">Persona de contacto:</label>
                <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
            </div>

            <div style="display:grid; grid-template-columns: repeat(2,1fr) ;">
                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important; margin-right: 5% !important;">
                    <input name="telefono_contacto" type="number" class="form-control cuadro_texto1" id="telefono_contacto" placeholder="telefono_contacto" value="<?= $row['tel_contacto']?>" requered>
                    <label for="telefono_contacto">Telefono personal:</label>
                    <!-- <div id="result_nombre" style="color:red; font-size:15px;"></div> -->
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="correo_contacto" type="email" class="form-control cuadro_texto1" id="correo_contacto" placeholder="correo_contacto" value="<?= $row['correo_contacto']?>" requered>
                    <label for="correo_contacto">Correo personal:</label>
                    <!-- <div id="result_nombre2" style="color:red; font-size:15px;"></div> -->
                </div>
            </div>

            <div class="form-floating mb-3" style="margin-top: 5%;">
                <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="usuario" value="<?= $row['usuario']?>" requered>
                <label for="usuario">Usuario:</label>
                <!-- <div id="result_usuario" style="color:red; font-size:15px;"></div> -->
            </div>
            
            <button type="submit" name="modificar_proveedor" style="border-radius:5px !important;">Actualizar</button>
        </form>
    </div>
    <!-- //TODO: Fin del formulario -->
</div>

    <script src="../../js/validaciones.js"></script>
</body>
</html>
