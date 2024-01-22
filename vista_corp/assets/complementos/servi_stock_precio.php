<!-- //! Confirmar que es un usuario -->
<?php
include "../vista_corp/assets/controladores/inicio_usuario.php";
include "../vista_corp/config/conexion.php";
// Consulta SQL
$servicio_nombre = 'abono';
$sql_precio = "SELECT precio FROM tbl_servicio WHERE nombre = '$servicio_nombre'";
$sql_duracion = "SELECT duracion FROM tbl_servicio where nombre = '$servicio_nombre'";

// Ejecutar la consulta
$result_precio = $conn->query($sql_precio);
$result_duracion = $conn->query($sql_duracion);

// Verificar si la consulta tuvo éxito
if ($result_precio === false || $result_duracion === false) {
    die("Error en la consulta: " . $conn->error);
}
?>