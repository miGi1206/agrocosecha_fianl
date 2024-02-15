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

//! funcion para capturar y mandar a la base de datos los datos que se ingresen en el formulario
if(isset($_POST["guardar_servicio"])) {
    
    $id = $_POST['identificacion'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    // Obtener la fecha actual
    $fecha_registro = date('Y-m-d'); // Formato: Año-Mes-Día
    $duracion = $_POST['duracion'];
    
    //* Validacion si el ID ingresada esta en la base de datos
    $consulta_existencia = "SELECT id FROM tbl_servicio WHERE id = '$id'";
    $id_existencia = mysqli_query($conn, $consulta_existencia);

    //* Condicion de el ID existe o no
    if (mysqli_num_rows($id_existencia) > 0) {  
        echo '<script>
                Swal.fire({
                    title: "El codigo ya esta registrado. Por favor, elige otra",
                    text: "",
                    icon: "error"
                }).then(function() {
                    history.back(); // Regresa a la página anterior
                });
            </script>';
        exit();  
    } 

    //* Validar si el usuario ya existe
    $consulta_existencia = "SELECT nombre FROM tbl_servicio WHERE nombre = '$nombre'";
    $nombre_existencia = mysqli_query($conn, $consulta_existencia);

    //* Condicion de el nombre existe o no
    if (mysqli_num_rows($nombre_existencia) > 0) {  
        echo '<script>
                Swal.fire({
                    title: "Este nombre ya esta registrado. Por favor, elige otro",
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


    else{

        // TODO: consulta sql para ingresar datos a la tabla admin
        $sql_servicio = "INSERT INTO `tbl_servicio`(`id`, `nombre`, `descripcion`, `precio`, `fecha_registro`, `duracion`,`tipo_servicio`) VALUES ('$id', '$nombre','$descripcion','$precio','$fecha_registro','$duracion', '$tipo')";
        echo "Consulta SQL: " . $sql_servicio; // Imprime la consulta SQL para depuración
        $result_servicio = mysqli_query($conn, $sql_servicio);

        // TODO: funcion para mandarlo de regreso a la tabla si no que mande un error
        if($result_servicio) {
            header("Location: ../../vistas/servicios/admin_servicio_tabla.php");
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