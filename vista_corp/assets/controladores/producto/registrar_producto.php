
<?php
include "../../conections/coneccion_tabla.php";

//! funcion para capturar y mandar a la base de datos los datos que se ingresen en el formulario
if(isset($_POST["guardar_producto"])) {
    
    $id = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    // Obtener la fecha actual
    $fecha_registro = date('Y-m-d'); // Formato: Año-Mes-Día
    $stock = $_POST['stock'];
    
    // TODO: verifica si la identificacion ya esta registrada
    $verificar_id = mysqli_query($conn, "SELECT id FROM tbl_producto WHERE id = '$id'");
    if(mysqli_num_rows($verificar_id) > 0) {
        die("Error: El ID '$id' ya existe esta registrado");
    }


    // TODO: consulta sql para ingresar datos a la tabla admin
    $sql_servicio = "INSERT INTO `tbl_producto`(`id`, `nombre`, `descripcion`, `precio`, `fecha_registro`, `stock`) VALUES ('$id', '$nombre','$descripcion','$precio','$fecha_registro','$stock')";
    echo "Consulta SQL: " . $sql_proveedor; // Imprime la consulta SQL para depuración
    $result_servicio = mysqli_query($conn, $sql_servicio);

    // TODO: funcion para mandarlo de regreso a la tabla si no que mande un error
    if($result_servicio) {
        header("Location: ../../vistas/producto/admin_producto_tabla.php");
    } else {
        die("Error en la consulta: " . mysqli_error($conn));
    }
}
?>
