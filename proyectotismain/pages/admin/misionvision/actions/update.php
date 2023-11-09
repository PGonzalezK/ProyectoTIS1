<?php

include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}



if (isset($_POST['submit'])) {
    $mision_actualizada = mysqli_real_escape_string($connection, $_POST['mision']);
    $vision_actualizada = mysqli_real_escape_string($connection, $_POST['vision']);

    // Actualiza la base de datos solo si los valores no están vacíos
    if (!empty($mision_actualizada)) {
        $query_actualizar_mision = "UPDATE misionvision SET contenido = '$mision_actualizada' WHERE tipo = 'mision'";
        $result_actualizar_mision = mysqli_query($connection, $query_actualizar_mision);
    }

    if (!empty($vision_actualizada)) {
        $query_actualizar_vision = "UPDATE misionvision SET contenido = '$vision_actualizada' WHERE tipo = 'vision'";
        $result_actualizar_vision = mysqli_query($connection, $query_actualizar_vision);
    }

    // Redirige a la página de visualización o muestra un mensaje de éxito
    header("Location: index.php?p=admin/misionvision/index");
    exit();
}

?>