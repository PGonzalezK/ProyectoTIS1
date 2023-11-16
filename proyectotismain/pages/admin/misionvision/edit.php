<?php

include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM misionvision WHERE tipo='mision' OR tipo='vision'";
$result = mysqli_query($connection, $query);

$mision = '';
$vision = '';

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['tipo'] === 'mision') {
        $mision = $row['contenido'];
    } elseif ($row['tipo'] === 'vision') {
        $vision = $row['contenido'];
    }
}
?>


<div class="container-fluid border-bottom bordere-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Editor de Mision y Vision</h2>
    </div>
</div>

<main class="container mt-5">
    <div class="card">
        <form action="index.php?p=admin/misionvision/actions/update" method="post">
        <div class="form-group">
            <label for="mision">Misión:</label>
            <textarea id="mision" name="mision" class="form-control" rows="5"><?php echo $mision; ?></textarea>
        </div>
        <div class="form-group">
            <label for="vision">Visión:</label>
            <textarea id="vision" name="vision" class="form-control" rows="5"><?php echo $vision; ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-outline-success">Guardar</button>
    </form>
    </div>

</main>