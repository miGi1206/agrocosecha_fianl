<?php
include "../../conections/coneccion_tabla.php";

//! funcion para capturar y mandar a la base de datos los datos que se ingresen en el formulario
if(isset($_POST["enviar_mensaje"])) {
    
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $municipio = $_POST['municipio'];
    $producto_interes = $_POST['productos'];
    $mensaje = $_POST['mensaje'];
    // Obtener la fecha actual
    $fecha_envio = date('Y-m-d'); // Formato: Año-Mes-Día

    // TODO: consulta sql para ingresar datos a la tabla admin
    $sql_mensaje = "INSERT INTO `contactanos`(`id`, `nombre`, `telefono`, `correo`, `municipio`, `producto_interes`, `mensaje`,`fecha_envio`) 
VALUES ('', '$nombre', '$telefono', '$email', '$municipio', '$producto_interes', '$mensaje','$fecha_envio')";

    echo "Consulta SQL: " . $sql_mensaje; // Imprime la consulta SQL para depuración
    $result_mensaje = mysqli_query($conn, $sql_mensaje);

    // TODO: funcion para mandarlo de regreso a la tabla si no que mande un error
    if($result_mensaje) {
        header("Location: /agrocosecha_final/vista_corp/contact.php");
        session_start();
        $_SESSION['msj_mensaje_enviado'] = "Mensaje enviado";
    } else {
        die("Error en la consulta: " . mysqli_error($conn));
    }
}
?>