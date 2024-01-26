<!-- //! Confirmar que es un usuario -->
<?php include "./assets/controladores/inicio_usuario.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Agrocosecha - Conctatanos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/Size-16.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/contactanos.css">
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
    <!-- Start Top Nav -->
    <?php include "./assets/complementos/navbar_superior.php"; ?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php include "./assets/complementos/navbar_menu.php"; ?>
    <!-- Close Header -->

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
    <div class="contenedor">
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
                <label for="productos">Productos de Interés:</label>
                <select id="productos" name="productos">
                    <option value="00">------</option>
                <?php
                
                //TODO: Consulta SQL para traer todos los datos de los administradores
                    $sql_producto = "SELECT id,nombre FROM `tbl_producto`";
                    $result = mysqli_query($conn,$sql_producto);
                    

                    //* Ciclo para mostrar los registros
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<option value='".$row['id']."'>".$row['nombre']."</option>"; 
                    }?>               
                </select>
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