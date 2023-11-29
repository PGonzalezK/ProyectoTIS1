<?php

require("database\connection.php");

// Comprueba si el usuario está logueado
$usuarioAutenticado = isset($_SESSION["email"]) && !empty($_SESSION["email"]);

$query = "SELECT * FROM emprendedores";
$stmt = $connection->prepare($query);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si la consulta fue exitosa


if (isset($_GET['mensajeExito']) && $_GET['mensajeExito'] == 1) {
    echo '<div class="alert alert-success">Su participación se envió con éxito. Recibirá un feedback por correo electrónico.</div>';
}
?>

<div class="container text-center">
    <div class="row">
        <div class="col">
        </div>
        <?php require('includes/users/navbar_users.php'); ?>
    </div>
</div>

<div class="container justify-content-between align-items-center">
    <form class="was" method="POST" action="index.php?p=emprendimiento\action\guardar_emprendimiento" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre">Nombre del Emprendimiento</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="ano_creacion">Año de creacion</label>
            <input type="text" class="form-control" id="ano_creacion" name="ano_creacion" required>
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripcion del Emprendimiento</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>
        <div class="mb-3">
            <label for="Direccion">Direccion</label>
            <input type="text" class="form-control" id="Direccion" name="direccion" required>
        </div>
        <div class="mb-3">
        <label for="foto" class="form-label">Imagen de su Emprendimiento</label>
        <input class="form-control" type="file" id="image" accept="image/png, image/jpeg" name="foto" required>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enviar</button>
    </div>
    </form>
</div>