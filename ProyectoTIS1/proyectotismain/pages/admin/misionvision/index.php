<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
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

if (empty($mision) && empty($vision)) {
    echo '<div class="container"><a href="index.php?p=admin/misionvision/actions/create" class="btn btn-primary">Crear Misión y Visión</a></div>';
} else {
    echo '<div class="container">
        <h1>Misión y Visión</h1>
        <div class="mission-vision">
            <h2>Misión</h2>
            <p>' . $mision . '</p>
        </div>
        <div class="mission-vision">
            <h2>Visión</h2>
            <p>' . $vision . '</p>
        </div>
        <a href="index.php?p=admin/misionvision/edit&mision=' . urlencode($mision) . '&vision=' . urlencode($vision) . '" class="btn btn-primary">Editar</a>
    </div>';
}
?>
