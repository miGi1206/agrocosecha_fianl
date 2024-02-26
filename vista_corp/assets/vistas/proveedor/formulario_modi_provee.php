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
    <link rel="stylesheet" href="../../../assets/css/formulario_personas.css ">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>
<body>
    <!-- //TODO: Formulario para modificar al admin; el formulario se muestra con la informacion de la base de datos -->
    <div class="formulario-contacto">
        <div class="contenedor">
            <div id="productos">
                <h1 class="text-siccess" style="color: #065F2C;"><b>Modificar proveedor</b></h1>
            </div> 
        <form action="../../controladores/proveedor/modificar_proveedor.php" method="POST">

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="nit" type="text" class="form-control cuadro_texto1" id="nit" placeholder="nit" value="<?= $row['nit']?>" readonly required>
                <label for="nit">NIT:</label>
            </div>

            <div class="form-floating mb-3" style="margin-top:5%; margin-bottom:5% !important;">
                <input name="nombre_razonsocial" type="text" class="form-control cuadro_texto1" id="nombre_razonsocial" placeholder="nombre_razonsocial" value="<?= $row['nombre_razonsocial']?>" required maxlength="100">
                <label for="nombre_razonsocial">Nombre o razon social:</label>
                <div id="result_nombre_razonsocial" style="color:red; font-size:15px;"></div>
            </div>

            <div class="campos">
                <div class="form-floating mb-3  campo_intermedio" style="margin-bottom:0px !important;" >
                    <input name="telefono_empresarial" type="text" class="form-control cuadro_texto1" id="telefono_empresarial" placeholder="telefono_empresarial" value="<?= $row['telefono']?>" requered maxlength="15">
                    <label for="telefono_empresarial">Telefono empresarial:</label>
                    <div id="result_telefono_empresarial" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3 correo_empresarial" style=" margin-bottom:5% !important;">
                    <input name="correo_empresarial" type="email" class="form-control cuadro_texto1" id="correo_empresarial" placeholder="correo_empresarial" value="<?= $row['correo']?>" requered maxlength="50">
                    <label for="correo_empresarial">Correo empresarial:</label>
                    <div id="result_correo_empresarial" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <hr>

            <div class="form-floating mb-3" style="margin-top: 5%;">
                <input name="nombre_contacto" type="text" class="form-control cuadro_texto1" id="nombre_contacto" placeholder="nombre_contacto" value="<?= $row['nom_per_contacto']?>" requered maxlength="30">
                <label for="nombre_contacto">Persona de contacto:</label>
                <div id="result_nombre_contacto" style="color:red; font-size:15px;"></div>
            </div>

            <div class="campos">
                <div class="form-floating mb-3  campo_intermedio" style="margin-top:15px; margin-bottom:0px !important; ">
                    <input name="telefono_contacto" type="text" class="form-control cuadro_texto1" id="telefono_contacto" placeholder="telefono_contacto" value="<?= $row['tel_contacto']?>" requered maxlength="15">
                    <label for="telefono_contacto">Telefono personal:</label>
                    <div id="result_telefono_contacto" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="correo_contacto" type="email" class="form-control cuadro_texto1" id="correo_contacto" placeholder="correo_contacto" value="<?= $row['correo_contacto']?>" requered maxlength="50">
                    <label for="correo_contacto">Correo personal:</label>
                </div>
            </div>

            <div class="form-floating mb-3" style="margin-top: 5%;">
                <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario" placeholder="usuario" value="<?= $row['usuario']?>" requered maxlength="50">
                <label for="usuario">Usuario:</label>
                <div id="result_usuario" style="color:red; font-size:15px;"></div>
            </div>
            
            <button type="submit" name="modificar_proveedor" style="border-radius:5px !important;">Actualizar</button>
        </form>
    </div>
    <!-- //TODO: Fin del formulario -->
</div>

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
</body>
</html>
