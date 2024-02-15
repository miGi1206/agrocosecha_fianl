<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//! Conectarse a la base de datos
include  "../../conections/coneccion_tabla.php";

//TODO: Condicion cuando le de en eliminar
if(isset($_POST['id_a_eliminar'])) {
    $id_a_eliminar = $_POST['id_a_eliminar'];

    $sql_proveedor = "SELECT nit FROM tbl_proveedor WHERE nit = '$id_a_eliminar'";
    echo $sql_proveedor;    
    $result_proveedor = mysqli_query($conn, $sql_proveedor);

    if ($result_proveedor) {
        $row = mysqli_fetch_assoc($result_proveedor);

        // Ahora $row contiene los datos de la fila, y puedes acceder a 'codigo_persona'
        $nit = $row['nit'];
    }
    //! Consulta SQL para eliminar el registro del admin
    $sql_delete_proveedor = "DELETE FROM `tbl_proveedor` WHERE `tbl_proveedor`.`nit`= '$nit'";
    
    //! Consulta SQL para eliminar el usuario del admin
    $sql_delete_usuario = "DELETE FROM `tbl_usuario` WHERE `tbl_usuario`.`nit_proveedor` = '$nit'";

    //* Condicion de registro eliminado
    if (mysqli_query($conn, $sql_delete_proveedor) && mysqli_query($conn, $sql_delete_usuario)) {
        session_start();
        $_SESSION['msj_eliminar'] = "Se eliminó la información del sistema";
        header("Location: ../../vistas/proveedor/admin_provee_tabla.php");
        exit(); // Asegúrate de salir después de la redirección
    } else {
        session_start();
        $_SESSION['msj_eliminar'] = "Error al eliminar la información";
        header("Location: ../../vistas/proveedor/admin_provee_tabla.php");
        exit(); // Asegúrate de salir después de la redirección
    }
}
?>
