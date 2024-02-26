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
include "../../conections/coneccion_tabla.php";

//! funcion para capturar y mandar a la base de datos los datos que se ingresen en el formulario
if(isset($_POST["guardar_producto"])) {
    
    $codigo_producto = $_POST['codigo_producto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $video = $_POST['video'];
    // Obtener la fecha actual
    $fecha_registro = date('Y-m-d'); // Formato: Año-Mes-Día
    
    // TODO: verifica si la identificacion ya esta registrada
    $consulta_existencia = "SELECT codigo_producto FROM tbl_producto WHERE codigo_producto = '$codigo_producto'";
    $id_existencia = mysqli_query($conn, $consulta_existencia);

    //* funcion para que el nombre solo lleve letras
    if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
        echo '<script>
            Swal.fire({
                title: "El nombre no debe contener numeros.",
                text: "",
                icon: "error"
            }).then(function() {
                history.back(); // Regresa a la página anterior
            });
        </script>';
        exit();
    }

    //* Condicion de el ID existe o no
    if (mysqli_num_rows($id_existencia) > 0) {  
        echo '<script>
                Swal.fire({
                    title: "el codigo ya esta registrado. Por favor, elige otra",
                    text: "",
                    icon: "error"
                }).then(function() {
                    history.back(); // Regresa a la página anterior
                });
            </script>';
        exit();  
    } 

    //* Validar si el usuario ya existe
    $consulta_existencia = "SELECT nombre FROM tbl_producto WHERE nombre = '$nombre'";
    $nombre_existencia = mysqli_query($conn, $consulta_existencia);

    //* Condicion de el ID existe o no
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

    else {

        // TODO: consulta sql para ingresar datos a la tabla admin
        $sql_producto = "INSERT INTO `tbl_producto`(`codigo_producto`, `nombre`, `descripcion`, `precio`, `fecha_registro`,`video`, `stock`) VALUES ('$codigo_producto', '$nombre','$descripcion','$precio','$fecha_registro','$video','$stock')";
        echo "Consulta SQL: " . $sql_producto; // Imprime la consulta SQL para depuración
        $result_producto = mysqli_query($conn, $sql_producto);

        // TODO: funcion para mandarlo de regreso a la tabla si no que mande un error
        if($result_producto) {
            header("Location: ../../vistas/producto/admin_producto_tabla.php");
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