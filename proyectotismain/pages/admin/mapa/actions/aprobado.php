<?php
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

if (isset($_GET['id_mapa'])) {
    $id = $_GET['id_mapa'];

    $query = "UPDATE mapa SET aprobado = 1 WHERE id_mapa = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        // Emprendedor aprobado correctamente
        // Ahora, enviar correo electrónico al usuario

        // Obtener la información del emprendedor aprobado
        $query_info = "SELECT * FROM mapa WHERE id_mapa = ?";
        $stmt_info = mysqli_prepare($connection, $query_info);
        mysqli_stmt_bind_param($stmt_info, 'i', $id);
        mysqli_stmt_execute($stmt_info);
        $result_info = mysqli_stmt_get_result($stmt_info);
        $row_info = mysqli_fetch_assoc($result_info);

        // Información del correo electrónico
        $to = $row_info['email'];
        $subject = "¡Tu punto en el mapa a sido aceptado!";
        $message = "Su Punto en el mapa ha sido aprobado y ahora se mostrará en la página de mapas, cualquier consulta puede responder este mismo mensaje .";

        // Ajusta los encabezados según sea necesario
        $headers = "From: nexomunicipal@gmail.com"; // Reemplaza con tu dirección de correo

        // Envía el correo
        mail($to, $subject, $message, $headers);

        echo "Punto aprobado correctamente. Se ha enviado un correo electrónico al usuario.";
    } else {
        echo "Error al aprobar emprendedor: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_info);
}

mysqli_close($connection);
?>