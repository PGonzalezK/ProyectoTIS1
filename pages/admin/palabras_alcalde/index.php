<?php

include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM palabrasalcalde WHERE";
$result = mysqli_query($connection, $query);


?>

<div class="container">
    <h1>Palabras alcalde</h1>
    <div class="palabras_alcalde">
        <h2>Palabras</h2>
        <p>
            <?php echo $palabras_alcalde; ?>
        </p>
    </div>
    <a href="index.php?p=admin/misionvision/edit" class="btn btn-primary">Editar</a>
</div>