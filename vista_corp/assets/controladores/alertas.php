<?php
    if(isset($_SESSION['msj_registrar'])){
        $respuesta = $_SESSION['msj_registrar'];?>
    <script>
    Swal.fire({
        title: "Informacion guardada exitosamente",
        text: "",
        icon: "success"
    });
    </script>

    <?php
    unset($_SESSION['msj_registrar']);
    }
    ?>

    <!-- //* alerta modificar registro -->
    <?php
    if(isset($_SESSION['msj_modificar'])){
        $respuesta = $_SESSION['msj_modificar'];?>
    <script>
    Swal.fire({
        title: "Informacion modificada exitosamente",
        text: "",
        icon: "success"
    });
    </script>

    <?php
    unset($_SESSION['msj_modificar']);
    }
    ?>