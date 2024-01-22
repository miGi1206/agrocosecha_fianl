<!-- //! Confirmar que es un usuario -->
<?php 
include "../vista_corp/assets/controladores/inicio_usuario.php";
include "../vista_corp/config/conexion.php";
// Consulta SQL
$producto_nombre = 'arroz';
$sql_stock = "SELECT stock FROM tbl_producto WHERE nombre = '$producto_nombre'";
$sql_precio = "SELECT precio FROM tbl_producto where nombre = '$producto_nombre'";

// Ejecutar la consulta
$result_stock = $conn->query($sql_stock);
$result_precio = $conn->query($sql_precio);

// Verificar si la consulta tuvo éxito
if ($result_stock === false || $result_precio === false) {
    die("Error en la consulta: " . $conn->error);
}
?>