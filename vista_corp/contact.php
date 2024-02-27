<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrocosecha - Conctatanos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/Size-16.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="./assets/css/contactanos.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../vista_corp/assets/css/fontawesome.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

    <?php include "./assets/conections/coneccion_tabla.php" ?>

    <?php
        session_start();
        include "./config/SERVER.php";
        include "./config/database.php";


        if($_POST){

            $usuario = $_POST['usuario'];
            $password = $_POST['contraseña'];
            
            $sql = "SELECT codigo_usuario, usuario, contraseña, cod_tipo_usuario from tbl_usuario where usuario='$usuario'";
            $resultado = $mysqli->query($sql);
            $num = $resultado->num_rows;

            if($num > 0){
                $row= $resultado->fetch_assoc();
                $password_bd = $row['contraseña'];
                $pass_c = sha1($password);

                if($password_bd == $pass_c){

                    $_SESSION['codigo_usuario'] = $row['codigo_usuario'];
                    $_SESSION['usuario'] = $row['usuario'];
                    $_SESSION['cod_tipo_usuario'] = $row['cod_tipo_usuario'];
                    if (isset($_SESSION['cod_tipo_usuario']) && $_SESSION['cod_tipo_usuario'] == "1") {
                        header("Location: ./assets/vistas/administrador/admin_admin_tabla.php");
                        session_start();
                        $_SESSION['msj_inicio_sesion'] = "Sesion iniciada";
                    } else {
                        header("Location: /agrocosecha_final/index.php");
                        session_start();
                        $_SESSION['msj_inicio_sesion'] = "Sesion iniciada";
                    }          
                    
                    exit;
                } else{
                    echo '<script>
                        Swal.fire({
                            title: "contraseña incorrecta",
                            text: "",
                            icon: "error"
                        }).then(function() {
                            window.location.replace("");
                        });
                    </script>';
                }
            }else{
                echo '<script>
                        Swal.fire({
                            title: "No existe este usuario",
                            text: "",
                            icon: "error"
                        }).then(function() {
                            window.location.replace("");
                        });
                    </script>';
            }
        }
    ?>

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
        background-color:white;
    }

    .fuera-navbar {
        margin-top: 8%;
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
        <!-- Start Top Nav -->
        <?php include "./assets/complementos/navbar_superior.php"; ?>
        <!-- Close Top Nav -->
        <!-- Header -->
        <?php include "./assets/complementos/navbar_menu.php"; ?>
        <!-- Close Header -->
    </div>

    <!-- Close Header -->

    <!-- Modal -->
    <?php include "../vista_corp/assets/complementos/modal.php"?>
    <!--fin moval-->
    <?php include "./assets/conections/coneccion_tabla.php"?>

    <!-- //* alerta mensaje enviado -->
    <?php
    if(isset($_SESSION['msj_mensaje_enviado'])){
        $respuesta = $_SESSION['msj_mensaje_enviado'];?>
    <script>
    Swal.fire({
        title: "mensaje enviado",
        text: "",
        icon: "success",
        timer: 2000,
        timerProgressBar: true,
        backdrop: false
    });
    </script>

    <?php
    unset($_SESSION['msj_mensaje_enviado']);
    }
    ?>


    <!-- Start Content Page -->
    <div class="contenedor fuera-navbar">
        <h2>Contactanos</h2>
        <p class="contactanos">Nuestro equipo comercial y técnico está a tu disposición para responder tus dudas,
            opiniones y necesidades o
            para darte una asesoría completa sobre un producto o servicio de tu interés.</p>
    </div>
    <!-- Start Contact -->
    <div class="formulario-contacto">
        <div style="text-align: center;">
            <h3 class="text-success h1 formulario"><b>formulario de contacto</b></h3>
        </div>
        <form action="../vista_corp/assets/controladores/mensajes/enviar_mensaje.php" method="POST" class="fromcantact">
        <div class="form-floating mb-3 campo_intermedio" style="margin-top:15px; margin-bottom:0px !important;">
                    <input name="nombre1" type="text" class="form-control cuadro_texto1" id="nombre1" placeholder="nombre1"
                        required maxlength="50">
                    <label for="nombre1">nombres:</label>
                    <div id="result_nombre1" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3" style="margin-top: 3%;">
                    <input name="telefono1" type="text" class="form-control cuadro_texto1" id="telefono1"
                        placeholder="telefono1" required maxlength="15">
                    <label for="telefono1">Telefono:</label>
                    <div id="result_telefono1" style="color:red; font-size:15px;"></div>
                </div>

                <div class="form-floating mb-3 campo_intermedio" style="margin-top:3%; margin-bottom:0px !important;">
                    <input name="correo1" type="email" class="form-control cuadro_texto1" id="correo1"
                        placeholder="Correo1" required maxlength="30">
                    <label for="correo1">Correo electronico:</label>
                </div>

                <div class="form-floating mb-3 campo_intermedio" style="margin-top: 3%; margin-bottom:0px !important;">
                    <input name="nombre3" type="text" class="form-control cuadro_texto1" id="nombre3" placeholder="nombre3"
                        required maxlength="50">
                    <label for="nombre3">Municipio:</label>
                </div>

                <div class="form-floating mb-3 campo_intermedio" style="margin-top:3%; margin-bottom:0px !important;">
                    <input name="asunto" type="text" class="form-control cuadro_texto1" id="asunto"
                        placeholder="asunto" required maxlength="60">
                    <label for="asunto">Asunto:</label>
                </div>

                <div class="form-floating mb-3 campo_intermedio" style="margin-top:3%; margin-bottom:0px !important;">
                    <textarea class="form-control cuadro_texto1" id="mensaje" name="mensaje" style="height: 100px;" required></textarea>
                    <label for="mensaje">Mensaje:</label>
                    <div id="result_mensaje" style="color:red; font-size:15px;"></div>
                </div>


            <button type="submit" class="submit" name="enviar_mensaje"  style="margin-top:3% !important ;" >Enviar</button>
        </form>
    </div>


    <!-- End Contact -->


    <!-- Start Footer -->
    <?php include "./assets/complementos/foother.php";?>
    <!-- End Footer -->

    <!-- Start Script -->
    <!-- validacion de nombre -->
    <script>
    const nombre1 = document.getElementById('nombre1');
    const result_nombre1 = document.getElementById('result_nombre1');

    let lastValidInputNombre1 = ''; // Variable para almacenar la última entrada válida

    nombre1.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombre1(textValue)) {
            nombre1.value =
                lastValidInputNombre1; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre1.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombre1 = textValue; // Actualizar la última entrada válida
        }
        result_nombre1.innerHTML = '';
    });

    function isValidInputNombre1(text) {
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ\s]*$/.test(text);
    }
    </script>

     <!-- validacion del telefono -->
    <script>
    const telefono1 = document.getElementById('telefono1');
    const result_telefono1 = document.getElementById('result_telefono1');

    let lastValidInputTelefono1 = ''; // Variable para almacenar la última entrada válida

    telefono1.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputTelefono1(textValue)) {
            telefono1.value = lastValidInputTelefono1; // Restaurar el último valor válido
            return result_telefono1.innerHTML = `Este campo solo permite números`;
        } else {
            lastValidInputTelefono1 = textValue; // Actualizar la última entrada válida
        }
        result_telefono1.innerHTML = '';
    });
1
    function isValidInputTelefono1(text) {
        // Verificar si la cadena solo contiene números
        return /^[0-9]*$/.test(text);
    }
    </script>
    <!-- validacion de correo -->
    <script>
    const correo1 = document.getElementById('correo1');

    correo1.addEventListener('keydown', (event) => {
        if (event.key === ' ') {
            event.preventDefault(); // Evitar que se escriba el espacio
        }
    });
    </script>
    <!-- alidacion de municipio -->
    <script>
    const nombre3 = document.getElementById('nombre3');
    const result_nombre3 = document.getElementById('result_nombre3');

    let lastValidInputNombre3 = ''; // Variable para almacenar la última entrada válida

    nombre3.addEventListener('input', (event) => {
        const textValue = event.currentTarget.value;

        if (!isValidInputNombre1(textValue)) {
            nombre3.value =
                lastValidInputNombre3; // Restaurar el último valor válido solo si la nueva entrada no es válida
            return result_nombre3.innerHTML = `El nombre no puede contener números ni caracteres especiales`;
        } else {
            lastValidInputNombre3 = textValue; // Actualizar la última entrada válida
        }
        result_nombre3.innerHTML = '';
    });

    function isValidInputNombre1(text) {
        // Verificar si la cadena solo contiene letras y espacios
        return /^[A-Za-zñÑ\s]*$/.test(text);
    }
    </script>

    <script src="../vista_corp/assets/js/jquery-1.11.0.min.js"></script>
    <script src="../vista_corp/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../vista_corp/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../vista_corp/assets/js/templatemo.js"></script>
    <script src="../vista_corp/assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>