<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\agrocosecha_final\vendor\autoload.php';



// Comprueba si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprueba si los datos del formulario están presentes
    if (isset($_POST['enviar_mensaje'])) {
        // Llama a la función sendEmailContacto() para enviar el correo electrónico
        sendEmailContacto($_POST);
    } else {
        echo "Error: No se encontraron datos del formulario.";
    }
} else {
    echo "Error: El formulario no ha sido enviado correctamente.";
}

// Función para enviar el correo electrónico
function sendEmailContacto($request)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'trabajadoragrocosecha'; // Correo electrónico desde el que se enviará el mensaje
        $mail->Password = 'ztef nfyh glcd wave'; // Contraseña del correo electrónico
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom($request['email'], $request['nombre']);
        $mail->addAddress('trabajadoragrocosecha@gmail.com', 'Trabajador Agrocosecha');

        // Contenido del correo electrónico
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de Contactanos';
        $mail->Body = '<b>Nombre: <p></b>'.$request['nombre'].'</p><br>
        <b>Telefono: </b> <p>'.$request['telefono'].
        '</p><br><b>Municipio: </b><p>'.$request['municipio'].
        '</p> <br><b>Asunto:</b><p>'.$request['asunto'].
        '</p><br><b>Este es el mensaje enviado:</b><br><p>' . $request['mensaje'] . 
        '</p><br><p>Para responder, contactarse con: ' . $request['email'] . '</p>';

        // Envío del correo electrónico
        $mail->send();
        echo 'Mensaje enviado. Pronto te responderemos!';
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>
