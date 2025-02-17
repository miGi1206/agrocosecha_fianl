<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrocosecha</title>
    <link rel="website icon" type="jpg" href="../../img/Size-16.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
//! Conectarse a la base de datos
include "../../conections/coneccion_tabla.php";

//TODO: Guarda la informaciion en variables 
    $codigo = $_POST['codigo_servicio'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $duracion = $_POST['duracion'];

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

    // Obtener el ID del producto a modificar de la URL
$id_usuario_modificar = $_POST['codigo_servicio'];

// Verificar la existencia del nombre excluyendo el usuario a modificar
$consulta_existencia = "SELECT nombre FROM tbl_servicio WHERE nombre = '$nombre' AND codigo_servicio != $id_usuario_modificar";
$nombre_existencia = mysqli_query($conn, $consulta_existencia);

if (mysqli_num_rows($nombre_existencia) > 0) {
    echo '<script>
        Swal.fire({
            title: "Este nombre ya está registrado. Por favor, elige otro",
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
    $sql_modi_servicio = "UPDATE `tbl_servicio` SET `cod_tipo_servicio`='$tipo', `nombre`='$nombre', `descripcion`='$descripcion', `precio`='$precio', `duracion`='$duracion' WHERE `tbl_servicio`.`codigo_servicio`='$codigo'";
    $result_modi_servicio = mysqli_query($conn, $sql_modi_servicio);


    //* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
    if($result_modi_servicio) {
        header("location: ../../vistas/servicios/admin_servicio_tabla.php");
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