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
$tipo_usuario = $_POST['tipo_usuario'];
$nombre = $_POST['nombre'];
$nombre2 = $_POST['nombre2'];
$apellido = $_POST['apellido'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$sexo = $_POST['sexo'];
$direccion = $_POST['direccion'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$usuario = $_POST['usuario'];


//* Validar si el usuario ya existe
// $consulta_existencia = "SELECT usuario FROM tbl_usuario WHERE usuario = '$usuario_admin'";
// $usuario_existencia = mysqli_query($conn, $consulta_existencia);

// //* funcion para que el nombre solo lleve letras
// if (!preg_match('/^[a-zA-Z\s]+$/', $nombre_admin)) {
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
// $consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario_admin' AND id != $id_usuario_modificar";
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
// $consulta_existencia = "SELECT correo FROM tbl_admin WHERE correo = '$correo_admin' AND id != $id_usuario_modificar";
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

    //TODO: colocar el codigo_persona de tbl_persona en una variable para guardar el usuario
    $sql_admin2 = "SELECT codigo_persona FROM tbl_persona WHERE identificacion = '$id'";
    $result_admin2 = mysqli_query($conn, $sql_admin2);

    if ($result_admin2) {
        $row = mysqli_fetch_assoc($result_admin2);

        // Ahora $row contiene los datos de la fila, y puedes acceder a 'codigo_persona'
        $codigo_persona = $row['codigo_persona'];
    } 

    //! Consulta de actualización para tbl_admin
    $sql_modi_admin = "UPDATE `tbl_persona` SET `primer_nombre`='$nombre', `segundo_nombre`='$nombre2',
    `primer_apellido`='$apellido',`segundo_apellido`='$apellido2',`correo`='$correo', `telefono`='$telefono',
    `cod_sexo`='$sexo',`fecha_nacimiento`='$fecha_nacimiento', `direccion`='$direccion' 
    WHERE `tbl_persona`.`codigo_persona`='$codigo_persona'";
    echo $sql_modi_admin;
    echo "<hr>";
    $result_modi_admin = mysqli_query($conn, $sql_modi_admin);

    //! Consulta de actualización para tbl_usuarios
    $sql_modi_usuario = "UPDATE `tbl_usuario` SET `usuario`='$usuario', `cod_tipo_usuario`='$tipo_usuario' WHERE `tbl_usuario`.`cod_persona`='$codigo_persona'";
    $result_modi_usuraio = mysqli_query($conn, $sql_modi_usuario);


    //* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
    if($result_modi_admin && $result_modi_usuraio) {
        header("location: ../../vistas/administrador/admin_admin_tabla.php");
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