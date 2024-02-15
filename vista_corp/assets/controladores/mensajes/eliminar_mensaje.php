<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    include "../../conections/coneccion_tabla.php";

    if(isset($_POST['id_a_eliminar'])) {
        $id_a_eliminar = $_POST['id_a_eliminar'];
        $sql_delete = "DELETE FROM `contactanos` WHERE  `contactanos`.`id`= $id_a_eliminar";

        $sql_delete2 = "DELETE FROM `contactanos` WHERE  `contactanos`.`id`= $id_a_eliminar";

        if (mysqli_query($conn, $sql_delete) && mysqli_query($conn, $sql_delete2)) {
            session_start();
            $_SESSION['msj_eliminar_mensaje'] = "Se eliminó la información del sistema";
            header("Location: ../../vistas/mensaje/admin_mensaje.php");
            exit(); // Asegúrate de salir después de la redirección
        } else {
            session_start();
            $_SESSION['msj_eliminar_mensaje'] = "Error al eliminar la información";
            header("Location: ../../vistas/mensaje/admin_mensaje.php");
            exit(); // Asegúrate de salir después de la redirección
        }
    }
?>