<?php
//! Conectarse a la base de datos
include "../../conections/coneccion_tabla.php";

//TODO: Guarda la informaciion en variables 
$id = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

//! Consulta de actualización para tbl_admin
$sql_modi_servicio = "UPDATE `tbl_producto` SET `nombre`='$nombre', `descripcion`='$descripcion', `precio`='$precio', `stock`='$stock' WHERE `tbl_producto`.`id`='$id'";
$result_modi_servicio = mysqli_query($conn, $sql_modi_servicio);


//* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
if($result_modi_servicio) {
    header("location: ../../vistas/producto/admin_producto_tabla.php");
} else {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>