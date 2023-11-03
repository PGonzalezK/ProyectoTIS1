<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM palabrasalcalde";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$titulo = $row['titulo'];
$contenido = $row['contenido'];
$nombre_alcalde = $row['nombre_alcalde'];
$imagen = $row['imagen'];
$fecha = $row['fecha'];

?>

<div class="container">
    <h1><?php echo $titulo; ?></h1>
    <p><?php echo $contenido; ?></p>
    <p>Alcalde: <?php echo $nombre_alcalde; ?></p>
    <p>Fecha: <?php echo $fecha; ?></p>

    <?php if ($_SESSION['id_rol'] === '1'): ?>
        <!-- Mostrar el botón de edición solo para administradores -->
        <a href="index.php?p=admin/palabras_alcalde/edit&id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
    <?php endif; ?>
</div>
