<?php
include("database/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nuevoEstado = $_POST["estado"];

    // Obtener la información de la participación
    $query_info = "SELECT * FROM participacion WHERE id = ?";
    $stmt_info = mysqli_prepare($connection, $query_info);
    mysqli_stmt_bind_param($stmt_info, 'i', $id);
    mysqli_stmt_execute($stmt_info);
    $result_info = mysqli_stmt_get_result($stmt_info);
    $row_info = mysqli_fetch_assoc($result_info);

    // Actualizar el estado de la participación
    $query_update = "UPDATE participacion SET estado_revision = ? WHERE id = ?";
    $stmt_update = mysqli_prepare($connection, $query_update);
    mysqli_stmt_bind_param($stmt_update, 'si', $nuevoEstado, $id);

    if (mysqli_stmt_execute($stmt_update)) {
        // Estado actualizado correctamente
        // Ahora, enviar correo electrónico al usuario

        // Información del correo electrónico
        $to = $row_info['email'];
        $subject = "¡Estado de participación actualizado!";
        $message = "El estado de su participación con ID " . $id . " ha sido actualizado a: " . $nuevoEstado . "\n";
        $message .= "Tipo de contribución: " . $row_info['tipo_contribucion'] . "\n";
        $message .= "Departamento: " . $row_info['departamento'] . "\n";
        $message .= "Descripción: " . $row_info['descripcion'] . "\n";

        // Ajusta los encabezados según sea necesario
        $headers = "From: tu@email.com"; // Reemplaza con tu dirección de correo

        // Envía el correo
        mail($to, $subject, $message, $headers);

        echo "Éxito: Estado actualizado correctamente. Se ha enviado un correo electrónico al usuario.";
    } else {
        echo "Error al actualizar el estado: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt_info);
    mysqli_stmt_close($stmt_update);
} else {
    echo "Error: Solicitud no válida.";
}

mysqli_close($connection);
?>
