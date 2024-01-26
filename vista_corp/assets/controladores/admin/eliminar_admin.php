<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//! Conectarse a la base de datos
include  "../../conections/coneccion_tabla.php";

//TODO: Condicion cuando le de en eliminar
if(isset($_POST['id_a_eliminar'])) {
    $id_a_eliminar = $_POST['id_a_eliminar'];

    //! Consulta SQL para eliminar el registro del admin
    $sql_delete_admin = "DELETE FROM `tbl_admin` WHERE  `tbl_admin`.`id`= $id_a_eliminar";


    //! Consulta SQL para eliminar el usuario del admin
    $sql_delete_usuario = "DELETE FROM `tbl_usuarios` WHERE `tbl_usuarios`.`id` = $id_a_eliminar";

    //* Condicion de registro eliminado
    if (mysqli_query($conn, $sql_delete_admin) && mysqli_query($conn, $sql_delete_usuario)) {
        session_start();
        $_SESSION['msj_eliminar'] = "Se eliminó la información del sistema";
        header("Location: ../../vistas/administrador/admin_admin_tabla.php");
        exit(); // Asegúrate de salir después de la redirección
    } else {
        session_start();
        $_SESSION['msj_eliminar'] = "Error al eliminar la información";
        header("Location: ../../vistas/administrador/admin_admin_tabla.php");
        exit(); // Asegúrate de salir después de la redirección
    }
}
?>
