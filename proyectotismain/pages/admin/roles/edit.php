<?php
include("database/connection.php");
include("middleware/auth.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$id_rol = $_GET["id_rol"];

$query = "SELECT * FROM roles WHERE idRol = " . $id_rol . ";";
$result = mysqli_query($connection, $query);

if ($rol = mysqli_fetch_assoc($result)) {
    $id_rol = $rol["idRol"];
    $nombreRol = $rol["nombreRol"];
} else {
    header("Location: index.php?p=brands/index");
}
?>

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Editor de Roles</h1>
    </div>
</div>

<main class="container mt-5">
    <div class="card">
        <form action="index.php?p=admin/roles/action/update" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="int" class="d-none" name="idRol" value="<?php echo $id_rol ?>">

                    <div class="col-md-12 mb-3">
                        <label for="nombreRol" class="form-label">Nombre de Rol</label>
                        <input type="text" id="nombreRol" class="form-control" name="nombreRol" value="<?php echo $nombreRol ?>"
                            placeholder="Nombre del rol" required>
                    </div>
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</main>
