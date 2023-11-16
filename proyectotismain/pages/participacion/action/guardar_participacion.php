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
    header("Location: index.php?p=participacion/participacion");
} else {
    // Manejar errores si la consulta falla
    die("Error en la consulta: " . $insert->error);
}

// Cerrar la consulta preparada
$insert->close();

// Cerrar la conexión a la base de datos
$connection->close();
?>