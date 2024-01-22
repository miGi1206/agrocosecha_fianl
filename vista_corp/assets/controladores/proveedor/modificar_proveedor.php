<?php
//! Conectarse a la base de datos
include "../../conections/coneccion_tabla.php";

//TODO: Guarda la informaciion en variables 
$id = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];


//* Encriptar la contraseña
$hashed_password = SHA1($contraseña);

//! Consulta de actualización para tbl_admin
$sql_modi_proveedor = "UPDATE `tbl_proveedor` SET `nombre`='$nombre', `usuario`='$usuario', `contraseña`='$hashed_password', `telefono`='$telefono', `correo`='$correo' WHERE `tbl_proveedor`.`id`='$id'";
$result_modi_proveedor = mysqli_query($conn, $sql_modi_proveedor);

//! Consulta de actualización para tbl_usuarios
$sql_modi_usuario = "UPDATE `tbl_usuarios` SET `id`='$id',`usuario`='$usuario', `password`='$hashed_password' WHERE `tbl_usuarios`.`id`='$id'";
$result_modi_usuraio = mysqli_query($conn, $sql_modi_usuario);

//* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
if($result_modi_proveedor && $result_modi_usuraio) {
    header("location: ../../vistas/proveedor/admin_provee_tabla.php");
} else {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>