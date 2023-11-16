<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear_departamento'])) {
        $nombre_departamento = mysqli_real_escape_string($connection, $_POST['nombre_departamento']);
        
        $query = "INSERT INTO departamento_participacion (nombre_departamento) VALUES ('$nombre_departamento')";
        $result = mysqli_query($connection, $query);
        
        if ($result) {
            echo "Departamento creado exitosamente.";
        } else {
            echo "Error al crear el departamento: " . mysqli_error($connection);
        }
    }
}
?>

<!-- Formulario para crear un nuevo departamento -->
<form method="POST" action="">
    <label for="nombre_departamento">Nombre del Departamento:</label>
    <input type="text" name="nombre_departamento" required>
    <button type="submit" name="crear_departamento" class="btn btn-success" >Crear Departamento</button>
</form>

