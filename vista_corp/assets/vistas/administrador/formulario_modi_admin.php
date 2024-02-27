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
                tbl_tipo_usuario.codigo_tipo_usuario, tbl_tipo_usuario.tipo_usuario, 
                tbl_sexo.codigo_sexo, tbl_sexo.sexo, tbl_persona.fecha_nacimiento, tbl_persona.direccion, tbl_usuario.usuario
                FROM `tbl_persona`
                JOIN `tbl_usuario` ON tbl_persona.codigo_persona = tbl_usuario.cod_persona
                JOIN `tbl_sexo` ON tbl_persona.cod_sexo = tbl_sexo.codigo_sexo
                JOIN `tbl_tipo_usuario` ON tbl_usuario.cod_tipo_usuario = tbl_tipo_usuario.codigo_tipo_usuario
                WHERE tbl_persona.identificacion = '$id'";
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
    <link rel="stylesheet" href="../../../assets/css/formulario_personas.css ">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- Enlace al archivo CSS de Bootstrap 5 -->
    <link rel="stylesheet" href="../../css/admin_cliente.css">
    <link rel="stylesheet" href="../../css/navbar_cliente.css">
    <link rel="stylesheet" href="../../css/navbar_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
</head>

<body>
    <style>
    .contenido-fijo {
        position: fixed;
        top: 0;
        /* Puedes ajustar la posición superior según tus necesidades */
        left: 0;
        /* Puedes ajustar la posición izquierda según tus necesidades */
        width: 100%;
        /* Establecer el ancho al 100% para que ocupe todo el ancho de la pantalla */
        z-index: 1000;
        /* Puedes ajustar la propiedad z-index según tus necesidades */
    }

    .fuera-navbar {
        margin-top: 6%;
    }

    @media (max-width: 1000px) {
        .fuera-navbar {
            margin-top: 10%;
        }
    }

    @media (max-width: 500px) {
        .fuera-navbar {
            margin-top: 15%;
        }
    }
    </style>
    <div class="contenido-fijo">
        <?php include "../../complementos/navbar_admin.php";?>
    </div>
    
    <!-- //TODO: Formulario para modificar al admin; el formulario se muestra con la informacion de la base de datos -->
    <div class="formulario-contacto fuera-navbar" >
        <div id="productos">
            <h1 class="text-success"><b>Modificar personas</b></h1>
        </div>
        <form action="../../controladores/admin/modificar_admin.php" method="POST">

            <div class="form-floating mb-3" style="margin-top:15px;">
                <input name="identificacion" type="number" class="form-control cuadro_texto1" id="identificacion"
                    placeholder="Identificacion" value="<?= $row['identificacion']?>" readonly required>
                <label for="identificacion">Identificación:</label>
            </div>

            <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:5% !important;">
                <label for="floatingInputipo" style="margin-top:-2% !important;">Tipo de usuario:</label>
                <select id="tipo_usuario" name="tipo_usuario" class="form-control cuadro_texto1" style="cursor:pointer;"
                    placeholder="tipo_usuario">
                    <?php
                    // Almacena el valor actual en una variable antes del bucle
                    $valorActual3 = $row['codigo_tipo_usuario'];
                    $valorActual4 = $row['tipo_usuario'];

                    // Muestra el valor actual como la primera opción
                    echo "<option value='$valorActual3'>$valorActual4</option>";

                    // Consulta SQL para traer todos los datos de los tipos de servicio
                    $sql_tipo_usuario = "SELECT * FROM `tbl_tipo_usuario` WHERE tipo_usuario <> 'proveedor'";
                    $result_usuario = mysqli_query($conn, $sql_tipo_usuario);

                    // Ciclo para mostrar los registros
                    while ($row4 = mysqli_fetch_assoc($result_usuario)) {
                        // Verifica que el valor no sea igual al valor actual
                        if ($row4['codigo_tipo_usuario'] != $valorActual3) {
                            echo "<option value='" . $row4['codigo_tipo_usuario'] . "'>" . $row4['tipo_usuario'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <hr>

            <div class="campos">
                <div class="form-floating mb-3 campo_intermedio" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="nombre" type="text" class="form-control cuadro_texto1" id="nombre" placeholder="nombre"
                        value="<?= $row['primer_nombre']?>" required maxlength="50">
                    <label for="nombre">Primer nombre:</label>
                    <div id="result_nombre" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="nombre2" type="text" class="form-control cuadro_texto1" id="nombre2"
                        placeholder="nombre2" value="<?= $row['segundo_nombre']?>" maxlength="50">
                    <label for="nombre2">Segundo nombre:<span style="color:#065F2C;">*opcional*</span></label>
                    <div id="result_nombre2" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <div class="campos">
                <div class="form-floating mb-3 campo_intermedio" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="apellido" type="text" class="form-control cuadro_texto1" id="apellido"
                        placeholder="apellido" value="<?= $row['primer_apellido']?>" required maxlength="50">
                    <label for="apellido">Primer apellido:</label>
                    <div id="result_apellido" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="apellido2" type="text" class="form-control cuadro_texto1" id="apellido2"
                        placeholder="apellido2" value="<?= $row['segundo_apellido']?>" maxlength="50">
                    <label for="apellido2">Segundo apellido:<span style="color:#065F2C;">*opcional*</span></label>
                    <div id="result_apellido2" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <div class="campos">

                <div class="form-floating mb-3 campo_intermedio"
                    style="margin-top:15px; margin-bottom:0px !important; ">
                    <input name="fecha_nacimiento" type="date" class="form-control cuadro_texto1" id="fecha_nacimiento"
                        placeholder="fecha_nacimiento" value="<?= $row['fecha_nacimiento']?>" required>
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:5% !important;">
                    <label for="floatingInputipo" style="margin-top:-5% !important;">Sexo:</label>
                    <select id="sexo" name="sexo" class="form-control cuadro_texto1" style="cursor:pointer;"
                        placeholder="Sexo">
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

            <div class="campos">
                <div class="form-floating mb-3 campo_intermedio" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="correo" type="email" class="form-control cuadro_texto1" id="correo"
                        placeholder="Correo" value="<?= $row['correo']?>" required>
                    <label for="correo">Correo electronico:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:5% !important;">
                    <input name="telefono" type="text" class="form-control cuadro_texto1" id="telefono"
                        placeholder="telefono" value="<?= $row['telefono']?>" required>
                    <label for="telefono">Telefono:</label>
                    <div id="result_telefono" style="color:red; font-size:15px;"></div>
                </div>
            </div>


            <div class="campos">
                <div class="form-floating mb-3 campo_intermedio"
                    style="margin-top:15px; margin-bottom:0px !important; ">
                    <input name="direccion" type="text" class="form-control cuadro_texto1" id="direccion"
                        placeholder="direccion" value="<?= $row['direccion']?>" required>
                    <label for="direccion">Dirección:</label>
                </div>

                <div class="form-floating mb-3" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="usuario" type="text" class="form-control cuadro_texto1" id="usuario"
                        placeholder="usuario" value="<?= $row['usuario']?>" required>
                    <label for="usuario">Usuario:</label>
                    <div id="result_usuario" style="color:red; font-size:15px;"></div>
                </div>
            </div>

            <button type="submit" name="sumit" id="guardar" style="margin-top:5%;">Actualizar</button>
        </form>
    </div>

    <!-- //! Validacion para solo letras y espacios en el campo del primer nombre -->
    <script>
    const nombre = document.getElementById('nombre');
    const result_nombre = document.getElementById('result_nombre');

    let lastValidInputNombre = ''; // Variable para almacenar la última entrada válida

    nombre.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombre(textValue)) {
            nombre.value =
                lastValidInputNombre; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombre = textValue; // Actualizar la última entrada válida
        }
        result_nombre.innerHTML = '';
    });

    function isValidInputNombre(text) {
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

        if (!isValidInputNombre2(textValue)) {
            nombre2.value =
                lastValidInputNombre2; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre2.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombre2 = textValue; // Actualizar la última entrada válida
        }
        result_nombre2.innerHTML = '';
    });

    function isValidInputNombre2(text) {
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

        if (!isValidInputApellido(textValue)) {
            apellido.value =
                lastValidInputApellido; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_apellido.innerHTML = `El apellido no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputApellido = textValue; // Actualizar la última entrada válida
        }
        result_apellido.innerHTML = '';
    });

    function isValidInputApellido(text) {
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

        if (!isValidInputApellido2(textValue)) {
            apellido2.value =
                lastValidInputApellido2; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_apellido2.innerHTML =
                `El apellido no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputApellido2 = textValue; // Actualizar la última entrada válida
        }
        result_apellido2.innerHTML = '';
    });

    function isValidInputApellido2(text) {
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ]*$/.test(text);
    }
    </script>

    <!-- //! vadidacion para bloquear la tecla espacio en el campo de correo -->
    <script>
    const correo = document.getElementById('correo');

    correo.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault(); // Evitar que se escriba el espacio
        }
    });
    </script>

    <!-- //! Validacion para solo numeros en el campo del telefono -->
    <script>
    const telefono = document.getElementById('telefono');
    const result_telefono = document.getElementById('result_telefono');

    let lastValidInputTelefono = ''; // Variable para almacenar la última entrada válida

    telefono.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputTelefono(textValue)) {
            telefono.value = lastValidInputTelefono; // Restaurar el último valor válido
            return result_telefono.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputTelefono = textValue; // Actualizar la última entrada válida
        }
        result_telefono.innerHTML = '';
    });

    function isValidInputTelefono(text) {
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
    </script>

    <!-- //! vadidacion para bloquear la tecla espacio en el campo de usuario -->
    <script>
    const usuario = document.getElementById('usuario');
    const result_usuario = document.getElementById('result_usuario');

    usuario.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidTextUsuario(textValue)) {
            result_usuario.innerHTML = `Máximo 50 caracteres alfanuméricos`;
        } else {
            result_usuario.innerHTML = '';
        }
    });

    usuario.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault(); // Evitar que se escriba el espacio
        }
    });

    function isValidTextUsuario(text) {
        const maxLength = 50;

        // Permitir letras y números
        return /^[A-Za-z0-9\s]*$/.test(text) && text.length <= maxLength;
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>