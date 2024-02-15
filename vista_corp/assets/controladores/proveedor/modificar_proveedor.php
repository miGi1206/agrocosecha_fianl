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
$nit = $_POST['nit'];
$nombre_empresarial = $_POST['nombre_empresarial'];
$telefono_empresarial = $_POST['telefono_empresarial'];
$correo_empresarial = $_POST['correo_empresarial'];
$nombre_contacto = $_POST['nombre_contacto'];
$telefono_contacto = $_POST['telefono_contacto'];
$correo_contacto = $_POST['correo_contacto'];
$usuario = $_POST['usuario'];

//* Validar si el usuario ya existe
// $consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario'";
// $usuario_existencia = mysqli_query($conn, $consulta_existencia);

// //* funcion para que el nombre solo lleve letras
// if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
//     echo '<script>
//         Swal.fire({
//             title: "El nombre solo debe contener letras.",
//             text: "",
//             icon: "error"
//         }).then(function() {
//             history.back(); // Regresa a la página anterior
//         });
//     </script>';
//     exit();
// }

// // Obtener el ID del usuario a modificar de la URL
// $id_usuario_modificar = $_POST['identificacion'];

// // Verificar la existencia del usuario excluyendo el usuario a modificar
// $consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario' AND id != $id_usuario_modificar";
// $usuario_existencia = mysqli_query($conn, $consulta_existencia);

// if (mysqli_num_rows($usuario_existencia) > 0) {
//     echo '<script>
//         Swal.fire({
//             title: "Este nombre de usuario ya está registrado. Por favor, elige otro",
//             text: "",
//             icon: "error"
//         }).then(function() {
//             history.back(); // Regresa a la página anterior
//         });
//     </script>';
//     exit();
// }

// // Verificar la existencia del correo excluyendo el usuario a modificar
// $consulta_existencia = "SELECT correo FROM tbl_proveedor WHERE correo = '$correo' AND id != $id_usuario_modificar";
// $correo_existencia = mysqli_query($conn, $consulta_existencia);

// if (mysqli_num_rows($correo_existencia) > 0) {
//     echo '<script>
//         Swal.fire({
//             title: "Este correo ya está registrado. Por favor, elige otro",
//             text: "",
//             icon: "error"
//         }).then(function() {
//             history.back(); // Regresa a la página anterior
//         });
//     </script>';
//     exit();
// }

// else{
    //! Consulta de actualización para tbl_admin
    $sql_modi_proveedor = "UPDATE `tbl_proveedor` SET `nombre_razonsocial`='$nombre_empresarial',
    `telefono`='$telefono_empresarial', `correo`='$correo_empresarial',`nom_per_contacto`='$nombre_contacto',
    `tel_contacto`='$telefono_contacto', `correo_contacto`='$correo_contacto' 
    WHERE `tbl_proveedor`.`nit`='$nit'";
    $result_modi_proveedor = mysqli_query($conn, $sql_modi_proveedor);

    //! Consulta de actualización para tbl_usuarios
    $sql_modi_usuario = "UPDATE `tbl_usuario` SET `usuario`='$usuario' WHERE `tbl_usuario`.`nit_proveedor`='$nit'";
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
// }
?>
</body>
</html>