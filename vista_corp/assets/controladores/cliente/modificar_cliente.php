<?php
//! Conectarse a la base de datos
include "../../conections/coneccion_tabla.php";

//TODO: Guarda la informaciion en variables 
$id_cliente = $_POST['identificacion'];
$nombre_cliente = $_POST['nombre'];
$usuario_cliente = $_POST['usuario'];
$contraseña_cliente = $_POST['contraseña'];
$correo_cliente = $_POST['correo'];

//* Encriptar la contraseña
$hashed_password = SHA1($contraseña_cliente);

//! Consulta de actualización para tbl_admin
$sql_modi_admin = "UPDATE `tbl_cliente` SET `nombre`='$nombre_cliente', `usuario`='$usuario_cliente', `contraseña`='$hashed_password', `correo`='$correo_cliente' WHERE `tbl_cliente`.`id`='$id_cliente'";
$result_modi_cliente = mysqli_query($conn, $sql_modi_admin);

//! Consulta de actualización para tbl_usuarios
$sql_modi_usuario = "UPDATE `tbl_usuarios` SET `id`='$id_cliente', `usuario`='$usuario_cliente', `password`='$hashed_password' WHERE `tbl_usuarios`.`id`='$id_cliente'";
$result_modi_usuario = mysqli_query($conn, $sql_modi_usuario);

//* Condicion de que si todo a sido correcto, lo redireccione a la vista de la tabla
if ($result_modi_usuario && $result_modi_cliente) {
    header("Location: ../../vistas/cliente/admin_cliente.php");
    session_start();
    $_SESSION['msj_modificar'] = "Se modifico la informacion al sistema";
} else {
    session_start();
    $_SESSION['msj_modificar'] = "error al modificar la información";
    // die("Error en la consulta: " . mysqli_error($conn));
}
?>