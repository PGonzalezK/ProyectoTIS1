<?php

include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}


// Consulta para obtener la misión y la visión desde la base de datos
$query = "SELECT * FROM misionvision";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $mision = $row['mision'];
    $vision = $row['vision'];
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
    <a href="index.php?p=admin/misionvision/edit" class="btn btn-primary">Editar</a>
</div>