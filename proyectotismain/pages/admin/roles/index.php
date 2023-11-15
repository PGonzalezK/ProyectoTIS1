<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM roles";
$result = mysqli_query($connection, $query);
?>


<div class="container">
    <h1>Roles Disponibles</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID de Rol</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td>
                        <?php echo $row['idRol']; ?>
                    </td>
                    <td>
                        <?php echo $row['nombreRol']; ?>
                    </td>
                    <td>
                        <a class="p-2 m-1 btn btn-outline-warning"
                            href="index.php?p=admin/roles/edit&id_rol=<?php echo $row['idRol']; ?>" role="button">Editar</a>
                        <a class="p-2 m-1 btn btn-outline-danger"
                            href="index.php?p=admin/roles/action/delete&id_rol=<?php echo $row['idRol']; ?>"
                            role="button">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a class=" btn btn-outline-success" href="index.php?p=admin/roles/create" role="button">Crear un Nuevo Rol</a>
</div>