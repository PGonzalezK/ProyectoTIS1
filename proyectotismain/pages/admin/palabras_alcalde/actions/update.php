<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $titulo_actualizado = $_POST['titulo'];
    $contenido_actualizado = $_POST['contenido'];
    $nombre_alcalde_actualizado = $_POST['nombre_alcalde'];
    $imagen_actualizada = $_POST['imagen'];
    $fecha_actualizada = $_POST['fecha'];

    // Actualiza la base de datos
    $query_actualizar = "UPDATE palabrasalcalde SET titulo='$titulo_actualizado', contenido='$contenido_actualizado', nombre_alcalde='$nombre_alcalde_actualizado', imagen='$imagen_actualizada', fecha='$fecha_actualizada' WHERE id='$id'";
    mysqli_query($connection, $query_actualizar);

    // Redirige a la página de visualización o muestra un mensaje de éxito
    header("Location: index.php?p=admin/palabras_alcalde/index");
}
?>
