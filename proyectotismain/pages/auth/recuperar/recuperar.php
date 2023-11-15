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

    // Mostrar el enlace de restablecimiento en la pantalla (puedes cambiar esto según tus necesidades)
    $resetLink = "index.php?p=auth/recuperar/restrablecer&token=$token";
    echo "Haz clic en el siguiente enlace para restablecer tu contraseña: <a href='$resetLink'>$resetLink</a>";
}


?>

<form action="" method="POST">
    <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar enlace de restablecimiento</button>
</form>