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
                            <img class="card-img img-fluid" src="assets/img/6face_ganado.png" alt="Card image cap"
                                id="product-detail">
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
                                                    <img class="card-img img-fluid" src="./assets/img/1face_ganado.png"
                                                        alt="Product Image 1">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="./assets/img/2face_ganado.png"
                                                        alt="Product Image 2">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="./assets/img/3face_gando.png"
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
                                                    <img class="card-img img-fluid" src="assets/img/4face_ganado.png"
                                                        alt="Product Image 4">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="assets/img/5face_ganado.png"
                                                        alt="Product Image 5">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="assets/img/6face_ganado.png"
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
                                                    <img class="card-img img-fluid" src="assets/img/1face_ganado.png"
                                                        alt="Product Image 7">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="assets/img/2face_ganado.png"
                                                        alt="Product Image 8">
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <img class="card-img img-fluid" src="assets/img/3face_gando.png"
                                                        alt="Product Image 9">
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
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="h2">Ganado</h1>
                                <?php
                                //! Mostrar el stock o el precio
                                include "../vista_corp/assets/controladores/stock_precio.php";
                                ?>

                                <h6>Description:</h6>
                                <p>

                                    Nos enorgullece presentar nuestro ganado , criado con esmero y dedicación en
                                    los extensos pastizales de nuestra región. Nuestro ganado es el resultado de
                                    prácticas ganaderas sostenibles, garantizando no solo productos cárnicos de alta
                                    calidad, sino también el respeto por el bienestar de los animales y la preservación
                                    del entorno. Con orgullo, ofrecemos a su mesa carne fresca y sabrosa, Criado de
                                    manera responsable y comprometida con la excelencia y la sostenibilidad en la
                                    producción ganadera.</p>

                            </div>
                            <div>
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/JBOmT-Mnm60?si=rpB4_5W3-uPtVAE1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>
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
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>