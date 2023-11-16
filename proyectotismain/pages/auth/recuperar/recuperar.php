<?php

require('database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($connection, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    // Verificar si el usuario con el correo electrónico existe en la base de datos

    // Generar un token único
    $token = bin2hex(random_bytes(32));

    // Calcular la fecha de vencimiento (por ejemplo, 1 hora desde ahora)
    $expirationDate = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Almacenar el token y la fecha de vencimiento en la base de datos
    $query = "UPDATE users SET reset_token = '$token', token_expiracion = '$expirationDate' WHERE email = '$email'";
    mysqli_query($connection, $query);

    // Enviar el enlace de restablecimiento por correo electrónico
    $resetLink = "http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=auth/recuperar/restrablecer&token=$token";
    
    $asunto = 'Restablecimiento de Contraseña';
    $cuerpo = "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href='$resetLink'>$resetLink</a>";
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html\r\n";
    $headers .= "From: <tu@dominio.com>\r\n";  // Reemplaza con tu dirección de correo
    
    mail($email, $asunto, $cuerpo, $headers);
    
    echo "Se ha enviado un correo con las instrucciones para restablecer la contraseña a $email."; // Hacer alerta JAVIERA
}

?>

<form action="" method="POST">
    <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar enlace de restablecimiento</button>
</form>