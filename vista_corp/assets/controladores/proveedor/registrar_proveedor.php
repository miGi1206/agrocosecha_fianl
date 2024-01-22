
<?php
include "../../conections/coneccion_tabla.php";

//! funcion para capturar y mandar a la base de datos los datos que se ingresen en el formulario
if(isset($_POST["guardar_proveedor"])) {
    
    $id = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $hashed_password = SHA1($contraseña); // Colocar la contraseña encriptada
    
    // TODO: verifica si la identificacion ya esta registrada
    $verificar_id_proveedor = mysqli_query($conn, "SELECT id FROM tbl_proveedor WHERE id = '$id'");
    $verificar_id_usuario = mysqli_query($conn, "SELECT id FROM tbl_usuarios WHERE id = '$id'");
    if(mysqli_num_rows($verificar_id_proveedor) > 0) {
        die("Error: El ID '$id' ya existe esta registrado");
    }elseif(mysqli_num_rows($verificar_id_usuario) > 0){
        die("Error: El ID '$id' ya existe esta registrado");
    }else{
    // TODO: consulta sql para ingresar datos a la tabla admin
    $sql_proveedor = "INSERT INTO `tbl_proveedor`(`id`, `nombre`, `usuario`, `contraseña`, `telefono`, `correo`) VALUES ('$id', '$nombre','$usuario','$hashed_password','$telefono','$correo')";
    echo "Consulta SQL: " . $sql_proveedor; // Imprime la consulta SQL para depuración
    $result_proveedor = mysqli_query($conn, $sql_proveedor);

    // TODO: consulta sql para ingresar datos a la tabla de usuarios
    $sql_usuario = "INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `tipo_usuario`) VALUES ('$id', '$usuario', '$hashed_password','3')";
    echo "Consulta SQL: " . $sql_usuario; // Imprime la consulta SQL para depuración
    $result_usuario = mysqli_query($conn, $sql_usuario);

    // TODO: funcion para mandarlo de regreso a la tabla si no que mande un error
    if($result_proveedor && $result_usuario) {
        header("Location: ../../vistas/proveedor/admin_provee_tabla.php");
    } else {
        die("Error en la consulta: " . mysqli_error($conn));
    }
}
}
?>
