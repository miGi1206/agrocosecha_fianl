<?php
//! Conectarse a la base de datos
include "../../conections/coneccion_tabla.php";

//TODO: Condicion para cuando le de en el boton de registrar del formulario
if(isset($_POST["guardar_admin"])) {
    
    //* Toma la informacion ingresada en el formulario y las guarda en variables
    $id = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    // Obtener la fecha actual
    $fecha_registro = date('Y-m-d'); // Formato: Año-Mes-Día
    $correo = $_POST['correo'];

    //* Validacion si el ID ingresada esta en la base de datos
    $sql_validacion = "SELECT id FROM tbl_admin WHERE id = '$id'";
    $result_validacion = mysqli_query($conn, $sql_validacion);

    //* Enviar un mensaje de que el ID ingresado ya existe
    if(mysqli_num_rows($result_validacion) > 0) {
        die("Error: El ID '$id' ya existe. Por favor, elija otro ID.");
    }

    //* Encriptar la contraseña
    $hashed_password = SHA1($contraseña);

    //! Consulta SQL para para mandar la informacion del admin a la base de datos
    $sql_admin = "INSERT INTO `tbl_admin`(`id`, `nombre`, `usuario`, `contraseña`, `fecha_registro`, `correo`) VALUES ('$id', '$nombre','$usuario','$hashed_password','$fecha_registro','$correo')";
    echo "Consulta SQL: " . $sql_admin; // Imprime la consulta SQL para depuración
    $result_admin = mysqli_query($conn, $sql_admin);

    //! Consulta SQL para mandar el usuario y contraseña a una tabla de usuario
    $sql_usuario = "INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `tipo_usuario`) VALUES ('$id', '$usuario', '$hashed_password','1')";
    echo "Consulta SQL: " . $sql_usuario; // Imprime la consulta SQL para depuración
    $result_usuario = mysqli_query($conn, $sql_usuario);

    //* Condicion de que si todo a sido correcto lo redireccione a la vista de la tabla
    if($result_admin && $result_usuario) {
        header("Location:  ../../vistas/administrador/admin_admin_tabla.php");
    } else {
        die("Error en la consulta: " . mysqli_error($conn));
    }
}
?>
