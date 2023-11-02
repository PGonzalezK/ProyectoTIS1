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

<div class="container">
    <h1>Misión y Visión</h1>
    <div class="mission-vision">
        <h2>Misión</h2>
        <p><?php echo $mision; ?></p>
    </div>
    <div class="mission-vision">
        <h2>Visión</h2>
        <p><?php echo $vision; ?></p>
    </div>
    <a href="index.php?p=admin/misionvision/edit&mision=<?php echo urlencode($mision); ?>&vision=<?php echo urlencode($vision); ?>" class="btn btn-primary">Editar</a>
</div>