<?php
//! Conectarse a la base de datos
include "../../conections/coneccion_tabla.php";

//TODO: Guarda la informaciion en variables 
$id_admin = $_POST['identificacion'];
$nombre_admin = $_POST['nombre'];
$correo_admin = $_POST['correo'];
$usuario_admin = $_POST['usuario'];
$contraseña_admin = $_POST['contraseña'];


//* Encriptar la contraseña
$hashed_password = SHA1($contraseña);

//! Consulta de actualización para tbl_admin
$sql_modi_admin = "UPDATE `tbl_admin` SET `nombre`='$nombre_admin', `usuario`='$usuario_admin', `contraseña`='$hashed_password', `correo`='$correo_admin' WHERE `tbl_admin`.`id`='$id_admin'";
$result_modi_admin = mysqli_query($conn, $sql_modi_admin);

//! Consulta de actualización para tbl_usuarios
$sql_modi_usuario = "UPDATE `tbl_usuarios` SET `id`='$id_admin',`usuario`='$usuario_admin', `password`='$hashed_password' WHERE `tbl_usuarios`.`id`='$id_admin'";
$result_modi_usuraio = mysqli_query($conn, $sql_modi_usuario);

//* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
if($result_modi_admin && $result_modi_usuraio) {
    header("location: ../../vistas/administrador/admin_admin_tabla.php");
} else {
    die("Error en la consulta: " . mysqli_error($conn));
}
?>

