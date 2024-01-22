<?php
//! Conectarse a la base de datos
include "../../conections/coneccion_tabla.php";

//TODO: Guarda la informaciion en variables 
    $id = $_POST['identificacion'];
    $tipo = $_POST['tipo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $duracion = $_POST['duracion'];

//! Consulta de actualización para tbl_admin
$sql_modi_servicio = "UPDATE `tbl_servicio` SET `tipo_servicio`='$tipo', `nombre`='$nombre', `descripcion`='$descripcion', `precio`='$precio', `duracion`='$duracion' WHERE `tbl_servicio`.`id`='$id'";
$result_modi_servicio = mysqli_query($conn, $sql_modi_servicio);


//* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
if($result_modi_servicio) {
    header("location: ../../vistas/servicios/admin_servicio_tabla.php");
} else {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>