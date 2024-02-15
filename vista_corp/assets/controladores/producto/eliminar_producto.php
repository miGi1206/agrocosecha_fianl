<?php
//! Conectarse a la base de datos
include  "../../conections/coneccion_tabla.php";

//TODO: Condicion cuando le de en eliminar
if(isset($_POST['id_a_eliminar'])) {
    $id_a_eliminar = $_POST['id_a_eliminar'];

    //! Consulta SQL para eliminar el registro del producto
    $sql_delete_producto = "DELETE FROM `tbl_producto` WHERE `tbl_producto`.`id`= $id_a_eliminar";
    $result_detete_producto = mysqli_query($conn, $sql_delete_producto);

    //* Condicion de registro eliminado
    if ($result_detete_producto) {
        session_start();
        $_SESSION['msj_eliminar'] = "Se eliminó la información del sistema";
        header("Location: ../../vistas/producto/admin_producto_tabla.php");
        exit(); // Asegúrate de salir después de la redirección
    } else {
        session_start();
        $_SESSION['msj_eliminar'] = "Error al eliminar la información";
        header("Location: ../../vistas/producto/admin_producto_tabla.php");
        exit(); // Asegúrate de salir después de la redirección
    }
}
?>
