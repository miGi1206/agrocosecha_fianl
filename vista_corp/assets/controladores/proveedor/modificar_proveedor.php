<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
//! Conectarse a la base de datos
include "../../conections/coneccion_tabla.php";

//TODO: Guarda la informaciion en variables 
$id = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

//* Validar si el usuario ya existe
$consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario'";
$usuario_existencia = mysqli_query($conn, $consulta_existencia);

//* funcion para que el nombre solo lleve letras
if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
    echo '<script>
        Swal.fire({
            title: "El nombre solo debe contener letras.",
            text: "",
            icon: "error"
        }).then(function() {
            history.back(); // Regresa a la página anterior
        });
    </script>';
    exit();
}

// Obtener el ID del usuario a modificar de la URL
$id_usuario_modificar = $_POST['identificacion'];

// Verificar la existencia del usuario excluyendo el usuario a modificar
$consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario' AND id != $id_usuario_modificar";
$usuario_existencia = mysqli_query($conn, $consulta_existencia);

if (mysqli_num_rows($usuario_existencia) > 0) {
    echo '<script>
        Swal.fire({
            title: "Este nombre de usuario ya está registrado. Por favor, elige otro",
            text: "",
            icon: "error"
        }).then(function() {
            history.back(); // Regresa a la página anterior
        });
    </script>';
    exit();
}

// Verificar la existencia del correo excluyendo el usuario a modificar
$consulta_existencia = "SELECT correo FROM tbl_proveedor WHERE correo = '$correo' AND id != $id_usuario_modificar";
$correo_existencia = mysqli_query($conn, $consulta_existencia);

if (mysqli_num_rows($correo_existencia) > 0) {
    echo '<script>
        Swal.fire({
            title: "Este correo ya está registrado. Por favor, elige otro",
            text: "",
            icon: "error"
        }).then(function() {
            history.back(); // Regresa a la página anterior
        });
    </script>';
    exit();
}

else{
    //! Consulta de actualización para tbl_admin
    $sql_modi_proveedor = "UPDATE `tbl_proveedor` SET `nombre`='$nombre', `usuario`='$usuario', `contraseña`='$hashed_password', `telefono`='$telefono', `correo`='$correo' WHERE `tbl_proveedor`.`id`='$id'";
    $result_modi_proveedor = mysqli_query($conn, $sql_modi_proveedor);

    //! Consulta de actualización para tbl_usuarios
    $sql_modi_usuario = "UPDATE `tbl_usuarios` SET `id`='$id',`usuario`='$usuario', `password`='$hashed_password' WHERE `tbl_usuarios`.`id`='$id'";
    $result_modi_usuraio = mysqli_query($conn, $sql_modi_usuario);

    //* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
    if($result_modi_proveedor && $result_modi_usuraio) {
        header("location: ../../vistas/proveedor/admin_provee_tabla.php");
        session_start();
        $_SESSION['msj_modificar'] = "Se modifico la informacion al sistema";
    } else {
        session_start();
        $_SESSION['msj_modificar'] = "error al modificar la información";
        // die("Error en la consulta: " . mysqli_error($conn));
    }
}
?>
</body>
</html>