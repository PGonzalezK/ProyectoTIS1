<?php
include("middleware/auth.php");
include("database/connection.php");

// Obtener datos del formulario
$tipo_contribucion = $_POST["tipo_contribucion"];
$departamento = $_POST["departamento"];
$descripcion = $_POST["descripcion"];
$otro_dpto_text = $_POST["otro_dpto_text"];
$rut = $_POST["rut"];  // Esta variable contiene el Rut enviado desde el formulario

// Obtener el ID del usuario asociado al Rut de la tabla 'users'
$id_usuario_query = "SELECT id FROM users WHERE rut = '$rut'";
$resultado_usuario = mysqli_query($connection, $id_usuario_query);

// Verificar si se encontró un usuario con el Rut proporcionado
if (mysqli_num_rows($resultado_usuario) > 0) {
    $fila_usuario = mysqli_fetch_assoc($resultado_usuario);
    $id_usuario = $fila_usuario["id"]; // Obtener el ID del usuario

    // Consulta preparada para evitar inyección SQL
    $insert = $connection->prepare("INSERT INTO `participacion` (id_usuario, tipo_contribucion, departamento, descripcion, otro_dpto_text) VALUES (?, ?, ?, ?, ?)");
    $insert->bind_param("issss", $id_usuario, $tipo_contribucion, $departamento, $descripcion, $otro_dpto_text);

    // Ejecutar consulta
    if ($insert->execute()) {
        header("Location: ../participacion/participacion.php");
    } else {
        // Manejar errores si la consulta falla
        die("Error en la consulta: " . $insert->error);
    }

    // Cerrar la consulta preparada
    $insert->close();
} else {
    // Manejar el caso cuando no se encuentra un usuario con el Rut proporcionado
    die("Usuario no encontrado.");
}

// Cerrar la conexión a la base de datos
$connection->close();
?>
