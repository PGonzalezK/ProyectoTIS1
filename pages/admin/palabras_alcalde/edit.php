<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM palabrasalcalde WHERE id='$id'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$titulo = $row['titulo'];
$contenido = $row['contenido'];
$nombre_alcalde = $row['nombre_alcalde'];
$imagen = $row['imagen'];
$fecha = $row['fecha'];
?>

<div class="container-fluid border-bottom bordere-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Editor de Palabras del Alcalde</h2>
    </div>
</div>

<main class="container mt-5">
    <div class="card">
        <form action="index.php?p=admin/palabras_alcalde/actions/update" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $titulo; ?>">
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea id="contenido" name="contenido" class="form-control" rows="5"><?php echo $contenido; ?></textarea>
            </div>
            <div class="form-group">
                <label for="nombre_alcalde">Nombre del Alcalde:</label>
                <input type="text" id="nombre_alcalde" name="nombre_alcalde" class="form-control" value="<?php echo $nombre_alcalde; ?>">
            </div>
            <div class="form-group">
                <label for="imagen">URL de la Imagen:</label>
                <input type="text" id="imagen" name="imagen" class="form-control" value="<?php echo $imagen; ?>">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="text" id="fecha" name="fecha" class="form-control" value="<?php echo $fecha; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</main>