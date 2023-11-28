<?php
include("middleware/auth.php");
include("database/connection.php");

// Obtener datos del formulario
$email = $_SESSION["email"];
$tipo_contribucion = $_POST["tipo_contribucion"];
$departamento = $_POST["departamento"];
$descripcion = $_POST["descripcion"];
$otro_dpto_text = $_POST["otro_dpto_text"];
$fecha = date("Y-m-d H:i:s");

// Consulta preparada para evitar inyección SQL
$insert = $connection->prepare("INSERT INTO `participacion` (email, tipo_contribucion, departamento, descripcion, otro_dpto_text, fecha) VALUES (?, ?, ?, ?, ?, ?)");
$insert->bind_param("ssssss", $email, $tipo_contribucion, $departamento, $descripcion, $otro_dpto_text, $fecha);

// Ejecutar consulta
if ($insert->execute()) {
    // Envío de correo electrónico
    $to = $email;
    $subject = "Confirmación de Participación";
    $message = "Gracias por tu participación. Hemos recibido la siguiente información:\n\n";
    $message .= "Tipo de contribución: $tipo_contribucion\n";
    $message .= "Departamento: $departamento\n";
    $message .= "Descripción: $descripcion\n";
    $message .= "Otro Departamento: $otro_dpto_text\n";
    $message .= "Fecha: $fecha\n";

    // Ajusta los encabezados según sea necesario
    $headers = "From: pruebaemailtis1@gmail.com"; // Reemplaza con tu dirección de correo

    // Envía el correo
    mail($to, $subject, $message, $headers);

    // Redirigir con mensaje de éxito
    header("Location: index.php?p=participacion/participacion&mensajeExito=1");
} else {
    // Manejar errores si la consulta falla
    die("Error en la consulta: " . $insert->error);
}

// Cerrar la consulta preparada
$insert->close();

// Cerrar la conexión a la base de datos
$connection->close();
?>
