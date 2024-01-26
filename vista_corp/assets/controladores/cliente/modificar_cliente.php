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
$id_cliente = $_POST['identificacion'];
$nombre_cliente = $_POST['nombre'];
$usuario_cliente = $_POST['usuario'];
$correo_cliente = $_POST['correo'];

// Obtener el ID del usuario a modificar de la URL
$id_usuario_modificar = $_POST['identificacion'];

// Verificar la existencia del usuario excluyendo el usuario a modificar
$consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario_cliente' AND id != $id_usuario_modificar";
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
$consulta_existencia = "SELECT correo FROM tbl_cliente WHERE correo = '$correo_cliente' AND id != $id_usuario_modificar";
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
    $sql_modi_admin = "UPDATE `tbl_cliente` SET `nombre`='$nombre_cliente', `usuario`='$usuario_cliente', `correo`='$correo_cliente' WHERE `tbl_cliente`.`id`='$id_cliente'";
    $result_modi_cliente = mysqli_query($conn, $sql_modi_admin);

    //! Consulta de actualización para tbl_usuarios
    $sql_modi_usuario = "UPDATE `tbl_usuarios` SET `id`='$id_cliente', `usuario`='$usuario_cliente' WHERE `tbl_usuarios`.`id`='$id_cliente'";
    $result_modi_usuario = mysqli_query($conn, $sql_modi_usuario);

    //* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
    if ($result_modi_usuario && $result_modi_cliente) {
        header("Location: ../../vistas/cliente/admin_cliente.php");
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