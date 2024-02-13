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
//! Conectarse con la base de datos
include "../../conections/coneccion_tabla.php";

//! Condicion para cuando le de en el boton de guardar
if (isset($_POST["nuevo_registro"])) {

    //* Guardar los datos ingresados en el formulario en variable
    $id = $_POST['identificacion'];
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $sexo = $_POST['sexo'];
    $fecha_creacion = date('Y-m-d'); // Formato: Año-Mes-Día
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    
    $confirm_password = $_POST["confirm_password"];
//* Validar si el ID ya existe
$consulta_existencia = "SELECT identificacion FROM tbl_persona WHERE identificacion = '$id'";
$id_existencia = mysqli_query($conn, $consulta_existencia);

//* Validar si el ID ya existe en los usuarios
$consulta_existencia = "SELECT codigo_usuario  FROM tbl_usuario WHERE codigo_usuario  = '$id'";
$id_usuario_existencia = mysqli_query($conn, $consulta_existencia);

//* Validar si el correo ya existe
$consulta_existencia = "SELECT correo FROM tbl_persona WHERE correo = '$correo'";
$correo_existencia = mysqli_query($conn, $consulta_existencia);

//* Validar si el usuario ya existe
$consulta_existencia = "SELECT usuario FROM tbl_usuario WHERE usuario = '$usuario'";
$usuario_existencia = mysqli_query($conn, $consulta_existencia);

//* funcion para que el nombre solo lleve letras
if (!preg_match('/^[a-zA-Z\s]+$/', $primer_nombre)) {
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

$maxLongitudUsuario = 20; // Establece la longitud máxima del usuario

if (strlen($usuario) > $maxLongitudUsuario) {
    echo '<script>
        Swal.fire({
            title: "El nombre de usuario tiene un máximo de ' . $maxLongitudUsuario . ' caracteres.",
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

//* Condicion de el ID existe o no
elseif (mysqli_num_rows($id_existencia) > 0 || mysqli_num_rows($id_usuario_existencia) > 0) {  
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
    else {
        
        //* Encriptar la contraseña
        $hashed_password = SHA1($contraseña);

            // Verificar si las contraseñas coinciden
            if ($contraseña === $confirm_password) {
                   //! Consulta SQL para guardar la informacion del cliente en la base de datos
                $sql_persona = "INSERT INTO 
                `tbl_persona` (`codigo_persona`,`identificacion`, `primer_nombre`, `segundo_nombre`,`primer_apellido`,`segundo_apellido`,`telefono`,`correo`,`cod_sexo `,`fecha_nacimiento`,`direccion`,`fecha_creacion`) 
                VALUES ('','$id', '$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$telefono','$correo','$sexo','$fecha_nacimiento','$direccion','$fecha_creacion')";

                $result_persona = mysqli_query($conn, $sql_persona);
                

                //! Consulta SQL para mandar el usuario y contraseña a una tabla de usuario
                $sql_usuario = "INSERT INTO `tbl_usuario` (`usuario`, `contraseña`, `cod_tipo_usuario `) VALUES ('$id', '$usuario', '$hashed_password','2')";                   
                $result_usuario = mysqli_query($conn, $sql_usuario);

                if ($result_persona && $result_usuario) {
                    echo '<script>
                        Swal.fire({
                            title: "registro exitoso",
                            text: "",
                            timer: 2000,
                            timerProgressBar:true,
                            icon: "success"
                        }).then(function() {
                            history.back();
                        });
                    </script>';
                } else {
                    die("Error en la consulta: " . mysqli_error($conn));
                }
            } else {
                // Las contraseñas no coinciden
                    echo '<script>
                        Swal.fire({
                            title: "Las contraseña no coninciden",
                            text: "",
                            timer: 2000,
                            timerProgressBar:true,
                            icon: "error"
                        }).then(function() {
                            history.back(); // Regresa a la página anterior
                        });
                    </script>';
                }
        

        //* Condicion de que si todo a sido correcto lo redireccione a la vista de la tabla
    }
}
?>
</body>
</html>