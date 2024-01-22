<?php
//! Conectarse a la base de datos
include  "../../conections/coneccion_tabla.php";

//TODO: Condicion cuando le de en eliminar
if(isset($_POST['id_a_eliminar'])) {
    $id_a_eliminar = $_POST['id_a_eliminar'];

    //! Consulta SQL para eliminar el registro del admin
    $sql_delete_producto = "DELETE FROM `tbl_producto` WHERE `tbl_producto`.`id`= $id_a_eliminar";
    $result_detete_producto = mysqli_query($conn, $sql_delete_producto);

    //* Condicion de registro eliminado
    if ($result_detete_producto) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
    }
}
?>
