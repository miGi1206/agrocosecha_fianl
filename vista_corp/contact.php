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
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="municipio">Municipio:</label>
                <input type="text" id="municipio" name="municipio" required>
            </div>

            <div class="form-group">
                <label for="productos">Asunto:</label>
                <input type="text" id="asunto" name="asunto" required>

            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4"></textarea>
            </div>

            <button type="submit" class="submit" name="enviar_mensaje">Enviar</button>
        </form>
    </div>


    <!-- End Contact -->


    <!-- Start Footer -->
    <?php include "./assets/complementos/foother.php";?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="../vista_corp/assets/js/jquery-1.11.0.min.js"></script>
    <script src="../vista_corp/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../vista_corp/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../vista_corp/assets/js/templatemo.js"></script>
    <script src="../vista_corp/assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>