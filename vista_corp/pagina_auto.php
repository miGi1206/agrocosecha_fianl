<?php include "./assets/complementos/prod_stock_precio.php";?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include "./assets/complementos/head_produc_servi.php"?>

</head>

<body>
    <!-- Start Top Nav -->
    <?php include "./assets/complementos/navbar_superior.php"; ?>
    <!-- Close Top Nav -->

    <!-- Header -->
    <?php include "./assets/complementos/navbar_menu.php"; ?>
    <!-- Close Header -->

    <!-- Close Header -->

    <!-- Modal -->
    <?php include "./assets/complementos/modal.php"?>
    <!--fin moval-->



    <!-- Start Content -->
    <div class="container py-3">
        <div class="row" id="div">

            <!--Inicio de sidebar-->
            <?php include "./assets/complementos/sidebar.php"?>
            <!--Fin del sidebar-->

            <div class="container pb-5 bg-light" style="width: 70%;">
                <div class="row">
                    <div class="col-lg-5 mt-5">
                        <div class="card mb-3">
                            <img class="card-img img-fluid" src="../vista_corp/assets/img/arroz.jpg"
                                alt="Card image cap" id="product-detail">
                        </div>
                        <div class="row">
                            <!--Start Controls-->
                            <div class="col-1 align-self-center">
                                <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                    <i class="text-dark fas fa-chevron-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </div>
                            <!--End Controls-->
                            <!--Start Carousel Wrapper-->
                            <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item"
                                data-bs-ride="carousel">
                                <!--Start Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="../vista_corp/assets/img/principio_arroz (1).jpg"
                                                        alt="Product Image 1">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="../vista_corp/assets/img/2Face_arroz.jpg"
                                                        alt="Product Image 2">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="../vista_corp/assets/img/3face_arroz.png"
                                                        alt="Product Image 3">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="../vista_corp/assets/img/4face_arroz.png"
                                                        alt="Product Image 4">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="../vista_corp/assets/img/5face_arroz.png"
                                                        alt="Product Image 5">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="../vista_corp/assets/img/6face_arroz.png"
                                                        alt="Product Image 6">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="../vista_corp/assets/img/arroz.jpg" alt="Product Image 7">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid"
                                                        src="../vista_corp/assets/img/ultimaface_arroz.png "
                                                        alt="Product Image 8">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.Third slide-->
                                </div>
                                <!--End Slides-->
                            </div>
                            <!--End Carousel Wrapper-->
                            <!--Start Controls-->
                            <div class="col-1 align-self-center">
                                <a href="#multi-item-example" role="button" data-bs-slide="next">
                                    <i class="text-dark fas fa-chevron-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!--End Controls-->

                        </div>
                    </div>
                    <!-- col end -->

                    <?php
                    $productos="";
                    if (isset($_GET['busqueda'])){
                        $busqueda = $_GET['busqueda'];
                        $productos = "WHERE tbl_producto.codigo_producto = '$busqueda'";
                    }
                    ?>

                    <?php
                    $alquiler="";
                    if (isset($_GET['busqueda2'])){
                        $alquiler_equipos = $_GET['busqueda2'];
                        $alquiler = "WHERE tbl_servicio.codigo_servicio = '$alquiler_equipos'";
                    }
                    ?>

                    <?php
                    $servicio_personal="";
                    if (isset($_GET['busqueda3'])){
                        $personal = $_GET['busqueda3'];
                        $servicio_personal = "WHERE tbl_servicio.codigo_servicio = '$personal'";
                    }
                    ?>

                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $productos = "";
                                $alquiler = "";

                                if (isset($_GET['busqueda'])) {
                                    $busqueda = $_GET['busqueda'];
                                    $productos = "WHERE tbl_producto.codigo_producto = '$busqueda'";
                                    $sql_producto = "SELECT * FROM `tbl_producto` $productos";
                                    $result_producto = mysqli_query($conn, $sql_producto);

                                    while ($row = mysqli_fetch_assoc($result_producto)) {
                            ?>
                                <h1 class="h2"><?= $row['nombre']?></h1>

                                <!-- //! Mostrar el precio y stock solo cuando se halla iniciado sesion como cliente -->
                                <?php
                                if (isset($_SESSION['cod_tipo_usuario']) && $_SESSION['cod_tipo_usuario'] == "2") {
                                            echo "<p><b>Precio: $". $row['precio'] . "</b></p>";
                                            echo "<p><b>Stock: ". $row['stock'] . "</b></p>";
                                }
                                ?>

                                <h6>Descripción</h6>
                                <p><?= $row['descripcion']?></p>

                                <!-- //! Mostrar el boton de comprar  -->
                                <?php
                                if (isset($_SESSION['cod_tipo_usuario']) && $_SESSION['cod_tipo_usuario'] == "2") {
                                    echo '<div class="navbar align-self-center d-flex">
                                                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                                                        <li class="nav-item">
                                                            <button class="nav-link" href="#"
                                                                style="background-color:#3aaa3c; border-radius:5px; padding:5%; color:white;  width: 130px;"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModalToggle2"
                                                                aria-expanded="false" role="button"><img
                                                                    src="/agrocosecha_final/vista_corp/assets/img/carrito-de-compras.png"
                                                                    alt=""></button>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                    
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                    
                                                            <div class="modal-body">
                                                                <div class="z-flex2">
                    
                                                                    <!-- inicio del formulario -->
                                                                    <form method="POST" action="">
                                                                        <img src="/agrocosecha_final/vista_corp/assets/img/nombre_logo.png"
                                                                            class="col-sm-6" id="ini_logo3" style="margin: auto">
                                                                        <h5 class="modal-title" id="exampleModalToggleLabel"
                                                                            style="margin-bottom: 5%; color: #065F2C;"><b>Comprar</b></h5>
                                                                        <div class="form-floating mb-3">
                                                                            <input type="number" class="form-control cuadro_texto2"
                                                                                id="floatingInput" name="cantidad" placeholder="cantidad"
                                                                                required>
                                                                            <label for="floatingInput">Cantidad</label>
                                                                        </div>
                                                                        <div class="form-floating mb-3">
                                                                            <input type="text" class="form-control cuadro_texto2"
                                                                                id="floatingInput" name="direccion" placeholder="direccion"
                                                                                required>
                                                                            <label for="floatingInput">Dirección</label>
                                                                        </div>
                                                                        <div class="form-floating mb-3">
                                                                            <input type="number" class="form-control cuadro_texto2"
                                                                                id="floatingInput" name="telefono" placeholder="direccion"
                                                                                required>
                                                                            <label for="floatingInput">Telefono</label>
                                                                        </div>
                                                                        <button type="submit" class="btn-iniciar2" style="padding:1% 5%; ">
                                                                            Comprar</button>
                                                                    </form>
                                                                    <!-- fin del formulario  -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>';
                                
                                }
                                ?>
                                <?php
                                    }
                                } elseif (isset($_GET['busqueda2'])) {
                                    $alquiler_equipos = $_GET['busqueda2'];
                                    $alquiler = "WHERE tbl_servicio.codigo_servicio = '$alquiler_equipos'";
                                    $sql_alquiler = "SELECT * FROM `tbl_servicio` $alquiler";
                                    $result_alquiler = mysqli_query($conn, $sql_alquiler);

                                    while ($row = mysqli_fetch_assoc($result_alquiler)) {
                            ?>
                                <h1 class="h2"><?= $row['nombre']?></h1>

                                <?php
                                if (isset($_SESSION['cod_tipo_usuario']) && $_SESSION['cod_tipo_usuario'] == "2") {
                                            echo "<p><b>Precio: $". $row['precio'] . "</b></p>";
                                            echo "<p><b>Duración: ". $row['duracion'] . "</b></p>";
                                }
                                ?>
                                <!-- <p><b>Precio: <?= $row['precio']?></b></p>
                                <p><b>Duración: <?= $row['duracion']?> horas</b></p> -->
                                <h6>Descripción</h6>
                                <p><?= $row['descripcion']?></p>
                                <?php
                                    }
                                }elseif (isset($_GET['busqueda3'])) {
                                    $personal = $_GET['busqueda3'];
                                    $servicio_personal = "WHERE tbl_servicio.codigo_servicio = '$personal'";
                                    $sql_servicio_personal = "SELECT * FROM `tbl_servicio` $servicio_personal";
                                    $result_personal = mysqli_query($conn, $sql_servicio_personal);

                                    while ($row = mysqli_fetch_assoc($result_personal)) {
                            ?>
                                <h1 class="h2"><?= $row['nombre']?></h1>
                                <p><b>Precio: <?= $row['precio']?></b></p>
                                <p><b>Duración: <?= $row['duracion']?> horas</b></p>
                                <h6>Descripción</h6>
                                <p><?= $row['descripcion']?></p>
                                <?php
                                    }
                            }
                            ?>


                            </div>
                            
                        </div>
                    </div>

                </div>

                <div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/UxeZeUd0Yb0" frameborder="0" allowfullscreen></iframe>

                    <!-- <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/JBOmT-Mnm60?si=rpB4_5W3-uPtVAE1" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe> -->
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- End Content -->

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