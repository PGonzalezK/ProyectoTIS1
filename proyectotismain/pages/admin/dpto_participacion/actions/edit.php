<?php

include("database/connection.php");
include("middleware/auth.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['editar_departamento'])) {
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        $nombre_departamento = mysqli_real_escape_string($connection, $_POST['nombre_departamento']);

        $query = "UPDATE departamento_participacion SET nombre_departamento='$nombre_departamento' WHERE id=$id";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "Departamento actualizado exitosamente.";
        } else {
            echo "Error al actualizar el departamento: " . mysqli_error($connection);
        }
    }
}

// Obtener la información del departamento para mostrar en el formulario de edición
$id = mysqli_real_escape_string($connection, $_GET['id']);
$query = "SELECT id, nombre_departamento FROM departamento_participacion WHERE id=$id";
$result = mysqli_query($connection, $query);
$departamento = mysqli_fetch_assoc($result);
?>

<!-- Formulario para editar el departamento -->
<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $departamento['id'] ?>">
    <label for="nombre_departamento">Nombre del Departamento:</label>
    <input type="text" name="nombre_departamento" value="<?= $departamento['nombre_departamento'] ?>" required>
    <button type="submit" name="editar_departamento" class='btn btn-primary'>Guardar Cambios</button>
</form>