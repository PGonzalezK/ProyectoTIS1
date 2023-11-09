<?php
include("middleware/auth.php");
include("database/connection.php");

$query = "SELECT * FROM palabrasalcalde";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
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
        <a href="index.php?p=admin/palabras_alcalde/actions/update2&id=<?php echo $row['id']; ?>" class="btn btn-primary">Editar</a>
    <?php endif; ?>
</div>

<?php
} else {
    // Mostrar el enlace "Agregar palabras" si no hay datos
    echo '<div class="container"><a href="index.php?p=admin/palabras_alcalde/actions/create" class="btn btn-primary">Agregar palabras</a></div>';?>
    <div class="container">
    <h1>Palabras del Alcalde</h1>
    <div><img src="pages/admin/palabras_alcalde/imagen/<?php echo $alcalde['imagen'];?>" class="imagen-tabla" alt="" width="200" height="150"></div>
    <p></p>
    <p>Alcalde:</p>
    <p>Fecha: </p>

</div>
<?php
}
?>
