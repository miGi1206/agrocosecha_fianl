<!DOCTYPE html>
<html lang="en">

<head>
    <title>Agrocosecha</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/Size-16.png" />

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/templatemo.css" />
    <link rel="stylesheet" href="./assets/css/quienes_somos.css" />
    <link rel="stylesheet" href="./assets/css/custom.css" />

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="../vista_corp/assets/css/fontawesome.min.css" />
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- //! iniciar sesion -->
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
        background-color: white;
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

        <?php include "./assets/conections/coneccion_tabla.php" ;?>


        <!-- Header -->
        <?php include "./assets/complementos/navbar_menu.php"; ?>
        <!-- Close Header -->
    </div>

    <!-- Modal -->
    <?php include "../vista_corp/assets/complementos/modal.php"?>
    <!--fin moval-->

    <section class="py-5 quienessomos fuera-navbar">

        <div class="row align-items-center py-5" style="margin-left:15%;">
            <div class="col12 col-md-6 text-white">
                <h1><b>Quienes somos</b></h1>
                <p>
                    Somos una empresa comprometida con la producción, venta y compra de alimentos
                    agrícolas, pecuarios, piscícolas en la subregión del Darién con una cada una comercial
                    a nivel nacional, uno de nuestro pilar se fundamenta en comercializar productos
                    frescos del campo hacia la mesa de nuestros clientes, esto lo hacemos con alianzas
                    colaborativa con los productores del medio para garantizar el crecimiento y la
                    estabilidad de cada uno de los campesinos aliados.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <img src="./assets/img/logomaiz1.png" alt="" />
            </div>
        </div>

    </section>
    <!-- Close Banner -->

    <!-- Start Section -->
    <section class="container bg-light py-5 sectionmision">
        <div class="misionvision">
            <div id="mision-container" class="container">
                <h2 class="mision">Misión</h2>
                <p>
                    Agroecoseecha S.A.S, Trabajamos en la producción de alimentos basado en el desarrollo
                    agropecuario, piscícola y forestal en la región del Darién bajo el enfoque de cadenas
                    productivas y la estrategia de económica circular, trabajando de forma colaborativa con
                    los productores del entorno, preservando el medio ambiente y el ecoturismo, para lograr
                    el mejoramiento de la calidad de vida de la población.
                </p>
            </div>
            <div class="separador"></div>
            <div id="vision-container1" class="container">
                <h2 class="mision">Visión</h2>
                <p>
                    AL 2028 Agroecoseecha S.A.S, será líder en la integración en la producción de alimentos
                    a mayor escalas e integradora de los productores de la región del Darién consolidando
                    así una dispensa agropecuaria, piscícola y forestal para los pobladores del Colombia y
                    el mundo. Además, tendremos reconocimiento a nivel nacional (Colombia) por haber
                    abanderado una misión integradora, pluralista e incluyente que trabaja por la calidad de
                    vida de la población del Darién y mejora los ingresos económicos de todas las familias
                    de la empresa.
                </p>
            </div>
        </div>
    </section>
    <!--End Brands-->

    <!--inico de objetivos-->
    <div class="objetivos">
        <h1>Objetivos</h1>
    </div>
    <div class="contenedorobjetivos">
        <div class="contenedor_objetivos">
            <h2>Desarrollo Sostenible</h2>
            <p>Fomentar prácticas agrícolas y comerciales sostenibles que preserven y
                regeneren los recursos naturales, contribuyendo al desarrollo económico y social de la región del
                Darién.</p>
        </div>
        <div class="contenedor_objetivos">
            <h2>Expansión de mercado</h2>
            <p>Ampliar nuestra presencia en el mercado nacional, consolidándonos como líderes
                en la producción y comercialización de alimentos agrícolas, pecuarios y piscícolas</p>
        </div>

        <div class="contenedor_objetivos">
            <h2>Alianza colaborativa</h2>
            <p>Fortalecer alianzas colaborativas con productores locales y actores del sector,
                promoviendo una red sólida que beneficie a todos los involucrados, desde agricultores hasta consumidores
                finales.</p>
        </div>
        <div class="contenedor_objetivos">
            <h2>Diversificación y Reconocimiento en Ecoturismo</h2>
            <p>Diversificar nuestras operaciones a través del ecoturismo, destacando la
                riqueza natural y cultural de la región del Darién, y posicionarnos como referentes en la conservación y
                promoción de experiencias turísticas sostenibles.</p>
        </div>
    </div>
    <!--Fin de objetivos-->
    <!--VALORES-->
    <div class="valores">
        <h1>Valores de la empresa</h1>
    </div>
    <div class="contenedor-padre">
        <div class="contenedor-hijo">
            <img src="../vista_corp/assets/img/amor.jpg" alt="Imagen 1">
            <h3><b>Amor</b></h3>
            <p>Cultivamos con amor, porque creemos que cada grano que cuidamos contribuye a un mundo más abundante y
                sostenible.</p>
        </div>
        <div class="contenedor-hijo">
            <img src="../vista_corp/assets/img/trasparencia.jpg" alt="Imagen 1">
            <h3><b>Tranparencia</b></h3>
            <p>Nuestra transparencia es tan clara como nuestros campos, donde cada proceso se revela con honestidad y
                apertura.</p>
        </div>
        <div class="contenedor-hijo">
            <img src="../vista_corp/assets/img/compromiso.jpg" alt="Imagen 1">
            <h3><b>Compromiso</b></h3>
            <p>Nuestro compromiso es la fuerza que une a nuestros agricultores y nos impulsa a cosechar calidad en cada
                rincón de la tierra.</p>
        </div>
        <div class="contenedor-hijo">
            <img src="../vista_corp/assets/img/respon.jpg" alt="Imagen 1">
            <h3><b>Responsabilidad</b></h3>
            <p>La responsabilidad guía cada paso, para preservar el bienestar de la tierra y la comunidad.</p>
        </div>
        <div class="contenedor-hijo">
            <img src="../vista_corp/assets/img/Colaboración.jpg" alt="Imagen 1">
            <h3><b>Colaboración</b></h3>
            <p>Juntos cultivamos más que alimentos: sembramos un futuro compartido y próspero.</p>
        </div>
        <div class="contenedor-hijo">
            <img src="../vista_corp/assets/img/Prudencia.jpg" alt="Imagen 1">
            <h3><b>Prudencia</b></h3>
            <p>Con prudencia, cultivamos con sabiduría, respetando la tierra y garantizando la sostenibilidad de
                nuestras prácticas agrícolas.</p>
        </div>
    </div>
    <!--fin de valores-->
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