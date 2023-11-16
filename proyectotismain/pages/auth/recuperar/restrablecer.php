<?php

require('database/connection.php');

// Obtener el token de la URL (enviado por el enlace de restablecimiento)
$token = $_GET['token'];

// Consultar la base de datos para verificar la validez del token
$query = "SELECT * FROM users WHERE reset_token = '$token' AND token_expiracion >= NOW()";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Token válido, permitir al usuario restablecer la contraseña

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Procesar el formulario de restablecimiento aquí

        $newPassword = mysqli_real_escape_string($connection, $_POST['new_password']);
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Actualizar la contraseña en la base de datos
        $user = mysqli_fetch_assoc($result);
        $userId = $user['id'];  // Obtener el ID del usuario
        $updateQuery = "UPDATE users SET password = '$hashedPassword', reset_token = NULL, token_expiracion = NULL WHERE id = $userId";
        mysqli_query($connection, $updateQuery);

        // Redirigir al usuario a la página de inicio de sesión u otra página de tu elección
        header("Location: index.php?p=auth/login");
        exit;
    }
} else {
    // Token no válido o ha expirado, muestra un mensaje de error o redirige a una página de error
    echo "Enlace no válido o ha expirado.";
    // Puedes agregar una redirección aquí si lo deseas.
    // header("Location: index.php?p=error");
    // exit;
}
?>

<form action="" method="POST">
    <div class="form-group">
        <label for="new_password">Nueva contraseña:</label>
        <input type="password" name="new_password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Restablecer contraseña</button>
</form>
