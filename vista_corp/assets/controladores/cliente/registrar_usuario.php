<?php
//! Conectarse con la base de datos
include "../../conections/coneccion_tabla.php";

//! Condicion para cuando le de en el boton de guardar
if (isset($_POST["nuevo_registro"])) {

    //* Guardar los datos ingresados en el formulario en variable
    $id = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $correo = $_POST['correo'];

    //* Validar si el ID ya existe
    $consulta_existencia = "SELECT id FROM tbl_cliente WHERE id = '$id'";
    $result_existencia = mysqli_query($conn, $consulta_existencia);

    //* Condicion de el ID existe o no
    if (mysqli_num_rows($result_existencia) > 0) {    
        echo "El ID ya existe en la base de datos. Por favor, elige otro.";
    } else {
        
        //* Encriptar la contraseña
        $hashed_password = SHA1($contraseña);

        //! Consulta SQL para guardar la informacion del cliente en la base de datos
        $sql_cliente = "INSERT INTO `tbl_cliente`(`id`, `nombre`, `usuario`, `contraseña`, `correo`) VALUES ('$id', '$nombre','$usuario','$hashed_password','$correo')";
        echo "Consulta SQL Cliente: " . $sql_cliente; // Imprime la consulta SQL para depuración
        $result_cliente = mysqli_query($conn, $sql_cliente);

        //! Consulta SQL para mandar el usuario y contraseña a una tabla de usuario
        $sql_usuario = "INSERT INTO `tbl_usuarios` (`id`, `usuario`, `password`, `tipo_usuario`) VALUES ('$id', '$usuario', '$hashed_password','2')";
        echo "Consulta SQL Usuario: " . $sql_usuario; // Imprime la consulta SQL para depuración
        $result_usuario = mysqli_query($conn, $sql_usuario);

        //* Condicion de que si todo a sido correcto lo redireccione a la vista de la tabla
        if ($result_cliente && $result_usuario) {
            header("Location: ../../../../index.php");
        } else {
            die("Error en la consulta: " . mysqli_error($conn));
        }
    }
}
?>
