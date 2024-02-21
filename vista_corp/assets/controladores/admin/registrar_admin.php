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
    $contraseña = $_POST['contraseña'];
    // Obtener la fecha actual
    $fecha_creacion = date('Y-m-d'); // Formato: Año-Mes-Día

    // * Validacion si el ID ingresada esta en la base de datos
    $consulta_existencia = "SELECT tbl_persona.identificacion, tbl_tipo_usuario.tipo_usuario 
    FROM tbl_persona 
    JOIN `tbl_usuario` ON tbl_persona.codigo_persona = tbl_usuario.cod_persona
    JOIN `tbl_tipo_usuario` ON tbl_usuario.cod_tipo_usuario = tbl_tipo_usuario.codigo_tipo_usuario
    WHERE tbl_persona.identificacion = '$id' AND tbl_tipo_usuario.codigo_tipo_usuario = '$tipo_usuario'";
    $id_existencia = mysqli_query($conn, $consulta_existencia);


    // //* Validacion si el ID ingresada esta en la base de datos
    // $consulta_existencia = "SELECT id FROM tbl_usuarios WHERE id = '$id'";
    // $id_usuario_existencia = mysqli_query($conn, $consulta_existencia);

     //* Validar si el correo ya existe
    $consulta_existencia = "SELECT correo FROM tbl_persona WHERE correo = '$correo'";
    $correo_existencia = mysqli_query($conn, $consulta_existencia);


    //* Validar si el usuario ya existe
    $consulta_existencia = "SELECT usuario FROM tbl_usuario WHERE usuario = '$usuario'";
    $usuario_existencia = mysqli_query($conn, $consulta_existencia);

    //* Condicion de el ID existe o no
    if (mysqli_num_rows($id_existencia) > 0) {  
        echo '<script>
                Swal.fire({
                    title: "La identificación con este tipo de usuario ya está registrada. Por favor, elige otra",
                    text: "",
                    icon: "error"
                }).then(function() {
                    history.back(); // Regresa a la página anterior
                });
            </script>';
        exit();  
    }

    // //* Condicion de el ID existe o no en usuario
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

    // //* Condicion de el correo existe o no
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
        $sql_admin = "INSERT INTO `tbl_persona`(`codigo_persona`,`identificacion`, `primer_nombre`,`segundo_nombre`,
        `primer_apellido`,`segundo_apellido`,`telefono`,`correo`,`cod_sexo`,`fecha_nacimiento`,`direccion`, 
        `fecha_creacion`) 
        VALUES (NULL,'$id', '$nombre', '$nombre2', '$apellido', '$apellido2','$telefono','$correo', '$sexo',
        '$fecha_nacimiento', '$direccion','$fecha_creacion')";
        echo "Consulta SQL: " . $sql_admin; // Imprime la consulta SQL para depuración
        $result_admin = mysqli_query($conn, $sql_admin);

        //TODO: colocar el codigo_persona de tbl_persona en una variable para guardar el usuario
        $sql_admin2 = "SELECT codigo_persona FROM tbl_persona WHERE identificacion = '$id'";
        $result_admin2 = mysqli_query($conn, $sql_admin2);

        if ($result_admin2) {
            $row = mysqli_fetch_assoc($result_admin2);

            // Ahora $row contiene los datos de la fila, y puedes acceder a 'codigo_persona'
            $codigo_persona = $row['codigo_persona'];
        } 


        //! Consulta SQL para mandar el usuario y contraseña a una tabla de usuario
        $sql_usuario = "INSERT INTO `tbl_usuario` (`codigo_usuario`, `usuario`, `contraseña`, 
        `cod_persona`, `cod_tipo_usuario`,`nit_proveedor`) 
        VALUES (NULL, '$usuario', '$hashed_password','$codigo_persona','$tipo_usuario',NULL)";
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