<?php
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "UPDATE emprendedores SET aprobado = 1 WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        // Emprendedor aprobado correctamente
        // Ahora, enviar correo electrónico al usuario

        // Obtener la información del emprendedor aprobado
        $query_info = "SELECT * FROM emprendedores WHERE id = ?";
        $stmt_info = mysqli_prepare($connection, $query_info);
        mysqli_stmt_bind_param($stmt_info, 'i', $id);
        mysqli_stmt_execute($stmt_info);
        $result_info = mysqli_stmt_get_result($stmt_info);
        $row_info = mysqli_fetch_assoc($result_info);

        // Información del correo electrónico
        $to = $row_info['email'];
        $subject = "¡Emprendimiento Aprobado!";
        $message = "Su emprendimiento ha sido aprobado y ahora se mostrará en la página de emprendedores.";

        // Ajusta los encabezados según sea necesario
        $headers = "From: tu@email.com"; // Reemplaza con tu dirección de correo

        // Envía el correo
        mail($to, $subject, $message, $headers);

        echo "Emprendedor aprobado correctamente. Se ha enviado un correo electrónico al usuario.";
    } else {
        echo "Error al aprobar emprendedor: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_info);
}

mysqli_close($connection);
?>