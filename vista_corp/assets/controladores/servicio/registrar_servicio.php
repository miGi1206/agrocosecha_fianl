
<?php
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
    
    // TODO: verifica si la identificacion ya esta registrada
    $verificar_id = mysqli_query($conn, "SELECT id FROM tbl_servicio WHERE id = '$id'");
    if(mysqli_num_rows($verificar_id) > 0) {
        die("Error: El ID '$id' ya existe esta registrado");
    }


    // TODO: consulta sql para ingresar datos a la tabla admin
    $sql_servicio = "INSERT INTO `tbl_servicio`(`id`, `nombre`, `descripcion`, `precio`, `fecha_registro`, `duracion`,`tipo_servicio`) VALUES ('$id', '$nombre','$descripcion','$precio','$fecha_registro','$duracion', '$tipo')";
    echo "Consulta SQL: " . $sql_servicio; // Imprime la consulta SQL para depuración
    $result_servicio = mysqli_query($conn, $sql_servicio);

    // TODO: funcion para mandarlo de regreso a la tabla si no que mande un error
    if($result_servicio) {
        header("Location: ../../vistas/servicios/admin_servicio_tabla.php");
    } else {
        die("Error en la consulta: " . mysqli_error($conn));
    }
}
?>
