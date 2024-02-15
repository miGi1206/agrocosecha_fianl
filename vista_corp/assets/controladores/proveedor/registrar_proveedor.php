<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include "../../conections/coneccion_tabla.php";

//! funcion para capturar y mandar a la base de datos los datos que se ingresen en el formulario
if(isset($_POST["guardar_proveedor"])) {
    
    $nit = $_POST['nit'];
    $nombre_razonsocial = $_POST['nombre_razonsocial'];
    $telefono_empresarial = $_POST['telefono_empresarial'];
    $correo_empresarial = $_POST['correo_empresarial'];
    $nombre_contacto = $_POST['nombre_contacto'];
    $telefono_contacto = $_POST['telefono_contacto'];
    $correo_contacto = $_POST['correo_contacto'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $hashed_password = SHA1($contraseña); // Colocar la contraseña encriptada
    
    // TODO: verifica si la identificacion ya esta registrada
    // $consulta_existencia ="SELECT id FROM tbl_proveedor WHERE id = '$id'";
    // $id_existencia = mysqli_query($conn, $consulta_existencia);

    // //* Validar si el id del usuario ya existe
    // $consulta_existencia ="SELECT id FROM tbl_usuarios WHERE id = '$id'";
    // $id_usuario_existencia = mysqli_query($conn, $consulta_existencia);

    // //* Validar si el correo ya existe
    // $consulta_existencia = "SELECT correo FROM tbl_proveedor WHERE correo = '$correo'";
    // $correo_existencia = mysqli_query($conn, $consulta_existencia);

    // //* Validar si el usuario ya existe
    // $consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario'";
    // $usuario_existencia = mysqli_query($conn, $consulta_existencia);

    // //* Condicion de el ID existe o no
    // if (mysqli_num_rows($id_existencia) > 0) {  
    //     echo '<script>
    //             Swal.fire({
    //                 title: "La identificacion ya esta registrado. Por favor, elige otra",
    //                 text: "",
    //                 icon: "error"
    //             }).then(function() {
    //                 history.back(); // Regresa a la página anterior
    //             });
    //         </script>';
    //     exit();  
    // } 
    // //* Condicion de el ID existe o no
    // if (mysqli_num_rows($id_usuario_existencia) > 0) {  
    //     echo '<script>
    //             Swal.fire({
    //                 title: "La identificacion ya esta registrado con un usuario. Por favor, elige otra",
    //                 text: "",
    //                 icon: "error"
    //             }).then(function() {
    //                 history.back(); // Regresa a la página anterior
    //             });
    //         </script>';
    //     exit();  
    // } 

    // //* funcion para que el nombre solo lleve letras
    // if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
    //     echo '<script>
    //         Swal.fire({
    //             title: "El nombre solo debe contener letras.",
    //             text: "",
    //             icon: "error"
    //         }).then(function() {
    //             history.back(); // Regresa a la página anterior
    //     </script>';
    //     exit();
    // }

    // //* Condicion de el correo existe o no
    // else if(mysqli_num_rows($correo_existencia) > 0) { 
    //     echo '<script>
    //         Swal.fire({
    //             title: "El correo ya esta registrado. Por favor, elige otro",
    //             text: "",
    //             icon: "error"
    //         }).then(function() {
    //             history.back(); // Regresa a la página anterior
    //         });
    //     </script>';
    //     exit();   
    // }

    // //* Condicion de el ucuario existe o no
    // elseif(mysqli_num_rows($usuario_existencia) > 0) { 
    //     echo '<script>
    //         Swal.fire({
    //             title: "Este nombre de usuario ya esta registrado.Por favor, elige otro",
    //             text: "",
    //             icon: "error"
    //         }).then(function() {
    //             history.back(); // Regresa a la página anterior
    //     </script>';
    //     exit(); 
    // }

    // $maxLongitudUsuario = 20; // Establece la longitud máxima del usuario
    // if (strlen($usuario) > $maxLongitudUsuario) {
    //     echo '<script>
    //         Swal.fire({
    //             title: "El nombre de usuario tiene un máximo de ' . $maxLongitudUsuario . ' caracteres.",
    //             text: "",
    //             icon: "error"
    //         }).then(function() {
    //             history.back(); // Regresa a la página anterior
    //         });
    //     </script>';
    //     exit(); // Agrega esta línea para evitar que se ejecuten más acciones después de mostrar la alerta
    // }

    // // Validar longitud de la contraseña
    // $minLongitudContrasena = 6; // Establece la longitud mínima de la contraseña
    // $maxLongitudContrasena = 20; // Establece la longitud máxima de la contraseña
    // if (strlen($contraseña) < $minLongitudContrasena || strlen($contraseña) > $maxLongitudContrasena) {
    //     echo '<script>
    //         Swal.fire({
    //             title: "La contraseña debe tener entre ' . $minLongitudContrasena . ' y ' . $maxLongitudContrasena . ' caracteres.",
    //             text: "",
    //             icon: "error"
    //         }).then(function() {
    //             history.back(); // Regresa a la página anterior
    //         });
    //     </script>';
    // }
    
    // else{
        // TODO: consulta sql para ingresar datos a la tabla admin
        $sql_proveedor = "INSERT INTO `tbl_proveedor`(`nit`, `nombre_razonsocial`, `telefono`, `correo`, `nom_per_contacto`, `tel_contacto`, `correo_contacto`) 
        VALUES ('$nit', '$nombre_razonsocial','$telefono_empresarial','$correo_empresarial', '$nombre_contacto',
        '$telefono_contacto','$correo_contacto')";
        echo "Consulta SQL: " . $sql_proveedor; // Imprime la consulta SQL para depuración
        $result_proveedor = mysqli_query($conn, $sql_proveedor);

        // TODO: consulta sql para ingresar datos a la tabla de usuarios
        $sql_usuario = "INSERT INTO `tbl_usuario` (`codigo_usuario`, `usuario`, `contraseña`, `cod_persona`,`cod_tipo_usuario`, `nit_proveedor`) 
        VALUES (NULL, '$usuario', '$hashed_password',NULL,'3','$nit')";
        echo "Consulta SQL: " . $sql_usuario; // Imprime la consulta SQL para depuración
        $result_usuario = mysqli_query($conn, $sql_usuario);

        // TODO: funcion para mandarlo de regreso a la tabla si no que mande un error
        if($result_proveedor && $result_usuario) {
            header("Location: ../../vistas/proveedor/admin_provee_tabla.php");
            session_start();
            $_SESSION['msj_registrar'] = "Se inserto la informacion al sistema";
        } else {
            session_start();
            $_SESSION['msj_registrar'] = "error al guardar la información";
            // die("Error en la consulta: " . mysqli_error($conn));
        }
    }
// }
?>
</body>
</html>