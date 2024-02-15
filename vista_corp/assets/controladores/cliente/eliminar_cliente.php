<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    include "../../conections/coneccion_tabla.php";

    if(isset($_POST['id_a_eliminar'])) {
        $id_a_eliminar = $_POST['id_a_eliminar'];
        $sql_delete_cliente = "DELETE FROM `tbl_cliente` WHERE  `tbl_cliente`.`id`= $id_a_eliminar";

        $sql_delete_usuario = "DELETE FROM `tbl_usuarios` WHERE  `tbl_usuarios`.`id`= $id_a_eliminar";

        if (mysqli_query($conn, $sql_delete_cliente) && mysqli_query($conn, $sql_delete_usuario)) {
            session_start();
            $_SESSION['msj_eliminar'] = "Se eliminó la información del sistema";
            header("Location: ../../vistas/cliente/admin_cliente.php");
            exit(); // Asegúrate de salir después de la redirección
        } else {
            session_start();
            $_SESSION['msj_eliminar'] = "Error al eliminar la información";
            header("Location: ../../vistas/cliente/admin_cliente.php");
            exit(); // Asegúrate de salir después de la redirección
        }
    }
?>
