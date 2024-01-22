<?php
//! Conectarse a la base de datos
include  "../../conections/coneccion_tabla.php";

//TODO: Condicion cuando le de en eliminar
if(isset($_POST['id_a_eliminar'])) {
    $id_a_eliminar = $_POST['id_a_eliminar'];

    //! Consulta SQL para eliminar el registro del admin
    $sql_delete_admin = "DELETE FROM `tbl_proveedor` WHERE  `tbl_proveedor`.`id`= $id_a_eliminar";
    $result_detete_admin = mysqli_query($conn, $sql_delete_admin);

    //! Consulta SQL para eliminar el usuario del admin
    $sql_delete_usuario = "DELETE FROM `tbl_usuarios` WHERE `tbl_usuarios`.`id` = $id_a_eliminar";
    $result_detete_usuario = mysqli_query($conn, $sql_delete_usuario);

    //* Condicion de registro eliminado
    if ($result_detete_admin && $result_detete_usuario) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
    }
}
?>
