<?php
    include "../../conections/coneccion_tabla.php";
?>
<?php
    if(isset($_POST['id_a_eliminar'])) {
        $id_a_eliminar = $_POST['id_a_eliminar'];
        $sql_delete = "DELETE FROM `tbl_cliente` WHERE  `tbl_cliente`.`id`= $id_a_eliminar";

        $sql_delete2 = "DELETE FROM `tbl_usuarios` WHERE  `tbl_usuarios`.`id`= $id_a_eliminar";
        if (mysqli_query($conn, $sql_delete)) {
            echo "Registro eliminado correctamente";
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conn);
        }

        if (mysqli_query($conn, $sql_delete2)) {
            echo "Registro eliminado correctamente";
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conn);
        }
    }
?>