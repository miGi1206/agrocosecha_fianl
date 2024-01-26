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
    $consulta_existencia = "SELECT id FROM tbl_admin WHERE id = '$id'";
    $id_existencia = mysqli_query($conn, $consulta_existencia);

    //* Validacion si el ID ingresada esta en la base de datos
    $consulta_existencia = "SELECT id FROM tbl_usuarios WHERE id = '$id'";
    $id_usuario_existencia = mysqli_query($conn, $consulta_existencia);

     //* Validar si el correo ya existe
    $consulta_existencia = "SELECT correo FROM tbl_admin WHERE correo = '$correo'";
    $correo_existencia = mysqli_query($conn, $consulta_existencia);


    //* Validar si el usuario ya existe
    $consulta_existencia = "SELECT usuario FROM tbl_usuarios WHERE usuario = '$usuario'";
    $usuario_existencia = mysqli_query($conn, $consulta_existencia);

    //* Condicion de el ID existe o no
    if (mysqli_num_rows($id_existencia) > 0) {  
        echo '<script>
                Swal.fire({
                    title: "La identificacion ya esta registrado. Por favor, elige otra",
                    text: "",
                    icon: "error"
                }).then(function() {
                    history.back(); // Regresa a la página anterior
                });
            </script>';
        exit();  
    } 

    //* Condicion de el ID existe o no en usuario
    if (mysqli_num_rows($id_usuario_existencia) > 0) {  
        echo '<script>
                Swal.fire({
                    title: "La identificacion ya esta registrado con un usuario. Por favor, elige otra",
                    text: "",
                    icon: "error"
                }).then(function() {
                    history.back(); // Regresa a la página anterior
                });
            </script>';
        exit();  
    } 

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

    //* Condicion de el correo existe o no
    elseif(mysqli_num_rows($correo_existencia) > 0) { 
        echo '<script>
            Swal.fire({
                title: "El correo ya esta registrado. Por favor, elige otro",
                text: "",
                icon: "error"
            }).then(function() {
                history.back(); // Regresa a la página anterior
            });
        </script>';
        exit();   
    }

     //* Condicion de el ucuario existe o no
    elseif(mysqli_num_rows($usuario_existencia) > 0) { 
        echo '<script>
            Swal.fire({
                title: "Este nombre de usuario ya esta registrado.Por favor, elige otro",
                text: "",
                icon: "error"
            }).then(function() {
                history.back(); // Regresa a la página anterior
            });
        </script>';
        exit(); 
    }

    $maxLongitudUsuario = 20; // Establece la longitud máxima del usuario
    if (strlen($usuario) > $maxLongitudUsuario) {
        echo '<script>
            Swal.fire({
                title: "El nombre de usuario debe tener menos de ' . $maxLongitudUsuario . ' caracteres.",
                text: "",
                icon: "error"
            }).then(function() {
                history.back(); // Regresa a la página anterior
            });
        </script>';
        exit(); // Agrega esta línea para evitar que se ejecuten más acciones después de mostrar la alerta
    }

    // Validar longitud de la contraseña
    $minLongitudContrasena = 6; // Establece la longitud mínima de la contraseña
    $maxLongitudContrasena = 20; // Establece la longitud máxima de la contraseña
    if (strlen($contraseña) < $minLongitudContrasena || strlen($contraseña) > $maxLongitudContrasena) {
        echo '<script>
            Swal.fire({
                title: "La contraseña debe tener entre ' . $minLongitudContrasena . ' y ' . $maxLongitudContrasena . ' caracteres.",
                text: "",
                icon: "error"
            }).then(function() {
                history.back(); // Regresa a la página anterior
            });
        </script>';
    }

    else{

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
            session_start();
            $_SESSION['msj_registrar'] = "Se inserto la informacion al sistema";
        } else {
            session_start();
            $_SESSION['msj_registrar'] = "error al guardar la información";
            // die("Error en la consulta: " . mysqli_error($conn));
        }
    }
}
?>
</body>
</html>