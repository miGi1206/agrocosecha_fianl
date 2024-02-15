<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
//! Conectarse a la base de datos
include  "../../conections/coneccion_tabla.php";

//TODO: Condicion cuando le de en eliminar
if(isset($_POST['id_a_eliminar'])) {
    $id_a_eliminar = $_POST['id_a_eliminar'];

    //TODO: colocar el codigo_persona de tbl_persona en una variable para guardar el usuario
    $sql_admin2 = "SELECT codigo_persona FROM tbl_persona WHERE identificacion = '$id_a_eliminar'";
    $result_admin2 = mysqli_query($conn, $sql_admin2);

    if ($result_admin2) {
        $row = mysqli_fetch_assoc($result_admin2);

        // Ahora $row contiene los datos de la fila, y puedes acceder a 'codigo_persona'
        $codigo_persona = $row['codigo_persona'];
    } 

    //! Consulta SQL para eliminar el registro del admin
    $sql_delete_admin = "DELETE FROM `tbl_persona` WHERE `tbl_persona`.`codigo_persona`= $codigo_persona";


    //! Consulta SQL para eliminar el usuario del admin
    $sql_delete_usuario = "DELETE FROM `tbl_usuario` WHERE `tbl_usuario`.`cod_persona` = $codigo_persona";

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
