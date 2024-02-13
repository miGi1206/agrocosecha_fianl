<!DOCTYPE html>
<html lang="en">

<head>
    <title>Agrocosecha</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="./vista_corp/assets/img/Size-16.png">

    <link rel="stylesheet" href="./vista_corp/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vista_corp/assets/css/templatemo.css">
    <link rel="stylesheet" href="./vista_corp/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="./vista_corp/assets/css/fontawesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- //! iniciar sesion -->
    <?php
        session_start();
        include "./vista_corp/config/SERVER.php";
        include "./vista_corp/config/database.php";


        if($_POST){

            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            
            $sql = "SELECT codigo_usuario, usuario, `contraseña`, cod_tipo_usuario  from tbl_usuario where usuario='$usuario'";
            $resultado = $mysqli->query($sql);
            $num = $resultado->num_rows;

            if($num > 0){
                $row= $resultado->fetch_assoc();
                $password_bd = $row['password'];
                $pass_c = sha1($password);

                if($password_bd == $pass_c){

                    $_SESSION['id'] = $row['id'];
                    $_SESSION['usuario'] = $row['usuario'];
                    $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                    if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == "1") {
                        header("Location: ./vista_corp/assets/vistas/mensaje/admin_mensaje.php");
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



    <!-- Start Top Nav -->
    <?php include "./vista_corp/assets/complementos/navbar_superior.php"?>
    <!-- Close Top Nav -->
    <?php include "./vista_corp/assets/conections/coneccion_tabla.php" ?>


    <!-- Header -->
    <?php include "./vista_corp/assets/complementos/navbar_menu.php";?>
    <!-- Close Header -->

    <!-- Modal -->
    <?php include "./vista_corp/assets/complementos/modal.php"?>
    <!--fin moval-->

    
    <!-- //* alerta sesion iniciada -->
    <?php
    if(isset($_SESSION['msj_inicio_sesion'])){
        $respuesta = $_SESSION['msj_inicio_sesion'];?>
    <script>
    Swal.fire({
        title: "Sesion iniciada",
        text: "",
        icon: "success",
        timer: 2000,
        timerProgressBar: true,
        backdrop: false
    });
    </script>

    <?php
    unset($_SESSION['msj_inicio_sesion']);
    }
    ?>

    <!-- Carrusel -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./vista_corp/assets/img/gallina.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Agrocosecha</b></h1>
                                <h3 class="h2">Gallinas</h3>
                                <p>
                                    las gallinas ponedoras se crian principalmente por su capacidad de poner huevos
                                    de manera regular y productiva.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./vista_corp/assets/img/yuca.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>Agrocosecha</b></h1>
                                <h3 class="h2">Yuca</h3>
                                <p>
                                    Es un alimento basico en muchas regiones tropicales y se utiliza
                                    en diversas preparaciones culinarias.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./vista_corp/assets/img/arroz.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success"><b>Agrocosecha</b></h1>
                                <h3 class="h2">Arroz</h3>
                                <p>
                                    El arroz es un cereal cultivado en todo el mundo y es uno de los alimentos más
                                    consumidos a nivel global.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- Fin carrusel -->


    <!-- Nuestros productos -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1"><b>Nuestros productos</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 p-5 mt-3">
                <a href="./vista_corp/vista_arroz.php"><img src="./vista_corp/assets/img/arrozcirculo.png"
                        class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Arroz</h5>
            </div>
            <div class="col-12 col-md-3 p-5 mt-3">
                <a href="./vista_corp/vista_gallinas.php"><img src="./vista_corp/assets/img/gallinacircular.jpg"
                        class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Gallina</h2>
            </div>
            <div class="col-12 col-md-3 p-5 mt-3">
                <a href="./vista_corp/vista_peces.php"><img src="./vista_corp/assets/img/pesecircular.jpg"
                        class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Peces</h2>
            </div>
            <div class="col-12 col-md-3 p-5 mt-3">
                <a href="./vista_corp/vista_yuca.php"><img src="./vista_corp/assets/img/yucacircular.jpg"
                        class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Yuca</h2>
            </div>
        </div>
    </section>
    <!-- Fin de nuestros productos -->

    <!-- Start Footer -->
    <?php include "./vista_corp/assets/complementos/foother.php";?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="./vista_corp/assets/js/jquery-1.11.0.min.js"></script>
    <script src="./vista_corp/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="./vista_corp/assets/js/bootstrap.bundle.min.js"></script>
    <script src="./vista_corp/assets/js/templatemo.js"></script>
    <script src="./vista_corp/assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>