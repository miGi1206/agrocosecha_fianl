<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mensaje</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

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
        $mail->Password = 'mnmx jnid dmoc wilv'; // Contraseña del correo electrónico
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom($request['correo1'], $request['nombre1']);
        $mail->addAddress('trabajadoragrocosecha@gmail.com', 'Trabajador Agrocosecha');

        // Contenido del correo electrónico
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje de Contactanos';
        $mail->Body = '<b>Nombre: <p></b>'.$request['nombre1'].'</p><br>
        <b>Telefono: </b> <p>'.$request['telefono1'].
        '</p><br><b>Municipio: </b><p>'.$request['nombre3'].
        '</p> <br><b>Asunto:</b><p>'.$request['asunto'].
        '</p><br><b>Este es el mensaje enviado:</b><br><p>' . $request['mensaje'] . 
        '</p><br><p>Para responder, contactarse con: ' . $request['correo1'] . '</p>';

        // Envío del correo electrónico
        $mail->send();
        echo '<script>
                Swal.fire({
                    title: "Mensaje enviado. Pronto te responderemos",
                    text: "",
                    icon: "success",
                    timer: 4000,
                    timerProgressBar: true,
                    backdrop: false
                }).then(function() {
                    history.back(); // Regresa a la página anterior
                });
            </script>';
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>
</body>
</html>