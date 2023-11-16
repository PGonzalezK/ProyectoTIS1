<?php

require('database/connection.php');

$email = isset($_GET['email']) ? $_GET['email'] : "";
$verification_token = isset($_GET['token']) ? $_GET['token'] : "";

if (!empty($email)) {
    // Construye el enlace de verificación después de definir $email y $verification_token
    $verificationlink = "http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=auth/verificar&email=$email&token=$verification_token";

    $query = "SELECT * FROM `users` WHERE email='$email' AND verification_token='$verification_token' AND token_expiration_verification > NOW()";

    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Token válido, activar la cuenta (por ejemplo, actualizar el campo de activación en la base de datos)
        $updateQuery = "UPDATE `users` SET activado = 1 WHERE email = '$email'";
        mysqli_query($connection, $updateQuery);

        // Redirige al usuario a la página de inicio de sesión o muestra un mensaje de éxito
        header("Location: index.php?p=auth/login");
        exit;
    } else {
        // Token no válido o ha expirado, muestra un mensaje de error o redirige a una página de error
        echo "Enlace no válido o ha expirado.";
        // Puedes agregar una redirección aquí si lo deseas.
        // header("Location: index.php?p=error");
        // exit;
    }
} else {
    echo "Error: El parámetro 'email' no está presente en la URL.";
}
