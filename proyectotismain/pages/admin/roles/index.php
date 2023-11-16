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

<main class="contenedor">
  <div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">Gestión de Roles</h1>
    </div>
  </div>
  <main class="contenedor mt-5 m-5">
    <table class="table table-bordered text-centered">
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
                            href="javascript:void(0);" onclick="confirmarEliminar(<?php echo $row['idRol']; ?>)"
                            role="button">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </main>
    <a class=" btn btn-outline-success ms-5" href="index.php?p=admin/roles/create" role="button">Crear un Nuevo Rol</a>
</main>

<script>
    function confirmarEliminar(idRol) {
        var confirmacion = confirm("¿Estás seguro que deseas eliminar este rol?");
        if (confirmacion) {
            window.location.href = "index.php?p=admin/roles/action/delete&id_rol=" + idRol;
        }
    }
</script>

<?php
mysqli_close($connection);
?>
