<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página
    if ($_SESSION['id_rol'] === '3') {
        // Si el id_rol es 3, mostrar un mensaje especial
        echo "<h2>No tienes permiso para ver esta página.</h2>";
    } else {
        // Redirigir a otra página o mostrar un mensaje de error estándar
        header("Location: index.php");
        exit();
    }
}

$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);
?>
    <?php if ($_SESSION['id_rol'] === '1') : ?>
<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">Gestión de usuarios</h1>
    </div>
</div>

<main class="contenedor mt-5 m-5">

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">

                </div>
            </div>
        </div>
        <main class="contenedor mt-5 m-5">
            <div class="card-body table-responsive ">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Rut</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope='col'>Rol</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $user['rut'] ?></th>
                            <td><?= $user['nombre'] ?></td>
                            <td><?= $user['apellido'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['id_rol'] ?></td>
                            <td>
                                <a href="index.php?p=admin/users/edit&rut=<?= $user['rut'] ?>"
                                    class="btn btn-sm btn-outline-warning">Editar</a>
                                <a href="javascript:void(0);" onclick="confirmarEliminar('<?= $user['rut'] ?>')"
                                    class="btn btn-sm btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>

                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
    </div>
    <?php endif; ?>
</main>

<script>
function confirmarEliminar(rut) {
    var confirmacion = confirm("¿Estás seguro que deseas eliminar este usuario?");
    if (confirmacion) {
        window.location.href = "index.php?p=admin/users/actions/delete&rut=" + rut;
    }
}
</script>

<?php
mysqli_close($connection);
?>