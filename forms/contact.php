<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validar el correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, ingresa un correo electrónico válido.";
        exit;
    }

    // Dirección de correo electrónico del destinatario
    $to = "sciencelearn00@gmail.com";

    // Asunto del correo
    $email_subject = "Nuevo mensaje de: $name - $subject";

    // Cuerpo del correo
    $email_body = "Nombre: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Asunto: $subject\n";
    $email_body .= "Mensaje:\n$message\n";

    // Cabeceras del correo
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n"; // Añadir codificación

    // Envío del correo
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Tu mensaje ha sido enviado. ¡Gracias!";
    } else {
        echo "¡Vaya! Algo salió mal y no pudimos enviar tu mensaje.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
