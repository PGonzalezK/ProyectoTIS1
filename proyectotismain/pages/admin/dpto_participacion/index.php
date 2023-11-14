<?php 
    include("middleware/auth.php");
    include("database/connection.php");

    if ($_SESSION['id_rol'] !=='1'){
        // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }
    
    $query = "SELECT id, nombre_departamento FROM departamento_participacion";
    $result = mysqli_query($connection, $query);
?>

<div class="container mt-5">
    <h2>Lista de Departamentos</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Departamento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nombre_departamento']}</td>";
                echo "<td><a href='index.php?p=admin/dpto_participacion/actions/edit&id={$row['id']}' class='btn btn-primary'>Editar</a> ";
                echo "<a href='index.php?p=admin/dpto_participacion/actions/delete&id={$row['id']}' class='btn btn-danger'>Eliminar</a>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Botón de agregar fuera del bucle -->
    <a href='index.php?p=admin/dpto_participacion/actions/create' class='btn btn-success'>Agregar</a>
</div>



<?php
    mysqli_close($connection);
?>
