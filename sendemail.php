<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar datos del formulario
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $caseType = $_POST["case_type"];
    $message = $_POST["message"];

    // Destinatario del correo electrónico
    $to = "info@abogadosmanassas.com";

    // Asunto del correo electrónico
    $subject = "Nuevo formulario de contacto";

    // Mensaje del correo electrónico
    $email_message = "Nombre: $username\n";
    $email_message .= "Teléfono: $phone\n";
    $email_message .= "Tipo de caso: $caseType\n";
    $email_message .= "Mensaje:\n$message";

    // Cabeceras del correo electrónico
    $headers = "From: $username <$to>\r\n";
    $headers .= "Reply-To: $to\r\n";

    // Intentar enviar el correo electrónico
    if (mail($to, $subject, $email_message, $headers)) {
        // Éxito al enviar el correo
        header("Location: confirmacion.html");
        exit();
    } else {
        // Error al enviar el correo
        echo "Error al enviar el formulario. Por favor, inténtelo de nuevo.";
    }
} else {
    // Redireccionar si se accede directamente a este script sin enviar el formulario
    header("Location: index.html");
    exit();
}
?>
