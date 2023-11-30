<?php
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener información del emprendedor antes de eliminarlo
    $query_info = "SELECT * FROM emprendedores WHERE id = ?";
    $stmt_info = mysqli_prepare($connection, $query_info);
    mysqli_stmt_bind_param($stmt_info, 'i', $id);
    mysqli_stmt_execute($stmt_info);
    $result_info = mysqli_stmt_get_result($stmt_info);
    $row_info = mysqli_fetch_assoc($result_info);

    // Guardar la información del emprendedor antes de eliminarlo
    $nombre_emprendedor = $row_info['nombre'];
    $email_emprendedor = $row_info['email'];

    // Eliminar al emprendedor
    $query_delete = "DELETE FROM emprendedores WHERE id = ?";
    $stmt_delete = mysqli_prepare($connection, $query_delete);
    mysqli_stmt_bind_param($stmt_delete, 'i', $id);

    if (mysqli_stmt_execute($stmt_delete)) {
        // Envía un correo electrónico al usuario informando que su emprendimiento ha sido eliminado
        $to = $email_emprendedor;
        $subject = "Información sobre tu emprendimiento";
        $message = "Lamentamos informarte que tu emprendimiento '$nombre_emprendedor' no cumple con nuestras normas/reglas y ha sido eliminado de la página.";

        // Ajusta los encabezados según sea necesario
        $headers = "From: tu@email.com"; // Reemplaza con tu dirección de correo

        // Envía el correo
        mail($to, $subject, $message, $headers);

        echo "Emprendedor eliminado correctamente. Se ha enviado un correo electrónico al usuario.";
    } else {
        echo "Error al eliminar emprendedor: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt_info);
    mysqli_stmt_close($stmt_delete);
}

mysqli_close($connection);
?>
