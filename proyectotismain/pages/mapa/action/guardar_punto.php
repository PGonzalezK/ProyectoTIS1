<?php
include("middleware/auth.php");
include("database/connection.php");

$email = $_SESSION["email"];

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Obtener datos del formulario
    $nombre_punto = isset($_POST["nombre_punto"]) ? $_POST["nombre_punto"] : "";
    $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
    $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : "";

    // Verificar si los campos requeridos están vacíos
    if (empty($nombre_punto) || empty($descripcion) || empty($direccion)) {
        echo "Por favor, completa todos los campos del formulario.";
        exit();
    }


    // Prevenir inyección de SQL escapando las variables
    $nombre_punto = $connection->real_escape_string($nombre_punto);
    $descripcion = $connection->real_escape_string($descripcion);
    $direccion = $connection->real_escape_string($direccion);
    $email = $connection->real_escape_string($email);

    // Preparar y ejecutar la consulta SQL
    $sql = "INSERT INTO mapa (email, nombre_punto, descripcion, direccion) VALUES ('$email', '$nombre_punto', '$descripcion', '$direccion')";

    if ($connection->query($sql) === TRUE) {
        header("Location: index.php?p=mapa/mapa&mensajeExito=1");
    } else {
        echo "Error al almacenar datos: " . $connection->error;
    }

    // Cerrar la conexión a la base de datos
    $connection->close();
}
?>
