<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$errores = [];

if (isset($_POST['submit'])) {
    $mision_nueva = mysqli_real_escape_string($connection, $_POST['mision']);
    $vision_nueva = mysqli_real_escape_string($connection, $_POST['vision']);

    // Insertar en la base de datos
    $query_insertar_mision = "INSERT INTO misionvision (tipo, contenido) VALUES ('mision', '$mision_nueva')";
    $result_insertar_mision = mysqli_query($connection, $query_insertar_mision);

    $query_insertar_vision = "INSERT INTO misionvision (tipo, contenido) VALUES ('vision', '$vision_nueva')";
    $result_insertar_vision = mysqli_query($connection, $query_insertar_vision);

    // Redirigir a la página de visualización o mostrar un mensaje de éxito
    header("Location: index.php?p=admin/misionvision/index");
    exit();
}


?>


<main class="container mt-5">
    <div class="card">
        <form action="" method="post">
        <div class="form-group">
            <label for="mision">Misión:</label>
            <textarea id="mision" name="mision" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="vision">Visión:</label>
            <textarea id="vision" name="vision" class="form-control" rows="5"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
    </form>
    </div>

</main>