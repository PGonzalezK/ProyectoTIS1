<?php
require('database/connection.php');
// Procesamiento del formulario de registro

if (isset($_POST['submit'])) {
    $email_del_usuario = $_POST['email'];
    $to_email = $email_del_usuario; 
    $subject = "Confirmación de registro";
    $message = "Gracias por registrarte en nuestro sitio. Por favor, haz clic en el enlace de confirmación.";
    $headers = "From: pruebaemailtis1@gmail.com";
    $sent_date = date("Y-m-d H:i:s");

    // Insertar un registro en la tabla de correos electrónicos
    $query = "INSERT INTO `emails` (to_email, subject, message, headers, status) VALUES ('$to_email', '$subject', '$message', '$headers', 'pendiente')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Envío de correo de confirmación
        if (mail($to_email, $subject, $message, $headers)) {
            // Actualizar el estado a "enviado" en la tabla de correos electrónicos
            $update_query = "UPDATE `emails` SET status='enviado' WHERE to_email='$to_email' AND subject='$subject'";
            $update_result = mysqli_query($connection, $update_query);
            if ($update_result) {
                echo "Se ha enviado un correo de confirmación a su dirección de correo.";
            } else {
                echo "El correo se envió, pero no se pudo actualizar el estado en la base de datos.";
            }
        } else {
            echo "No se pudo enviar el correo de confirmación.";
        }
    } else {
        echo "No se pudo insertar el correo en la base de datos.";
    }

    // Después de una inserción exitosa, genera el correo de confirmación y envíalo
    $to_email = $_POST['email']; 
    // Genera el correo de confirmación y envíalo como se indicó en la respuesta anterior

    // Redirige al usuario a una página de confirmación o inicio de sesión
    header("Location: index.php?p=auth/login"); 
    exit();
}
?>