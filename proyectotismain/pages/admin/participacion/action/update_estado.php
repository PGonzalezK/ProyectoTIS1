<?php
include("database/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nuevoEstado = $_POST["estado"];

    $query = "UPDATE participacion SET estado_revision = '$nuevoEstado' WHERE id = $id";

    if (mysqli_query($connection, $query)) {
        echo "Éxito: Estado actualizado correctamente.";
    } else {
        echo "Error al actualizar el estado: " . mysqli_error($connection);
    }
} else {
    echo "Error: Solicitud no válida.";
}
?>
