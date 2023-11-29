<?php
include("database/connection.php");

if ($_SESSION['id_rol'] !=='1'){
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $query = "DELETE FROM emprendedores WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Emprendedor eliminado correctamente.";
    } else {
        echo "Error al eliminar emprendedor: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>
