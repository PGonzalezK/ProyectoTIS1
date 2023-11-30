<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$query = "SELECT * FROM categoria";
$resultadoConsulta = mysqli_query($connection, $query);
$resultado = $_GET['resultado'] ?? null;
?>

<main class="contenedor">
    <div class="container-fluid border-bottom border-top bg-body-tertiary">
        <div class=" p-5 rounded text-center">
            <h2 class="fw-normal">Gestión de Categorias noticias</h1>
        </div>
    </div>
 <main class="contenedor mt-5 m-5">
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($categorias = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <th scope="row">
                        <?php echo $categorias['id_categoria']; ?>
                    </th>
                    <td>
                     <?php echo $categorias['nombre']; ?>
                    </td>
                    <td>
                        <a class="p-2 m-1 btn btn-outline-warning"
                            href="index.php?p=admin/categorias/actions/update&id_categoria=<?php echo $categorias['id_categoria']; ?>"
                            role="button">Editar</a>
                        <a class="p-2 m-1 btn btn-outline-danger"
                            href="index.php?p=admin/categorias/actions/delete&id_categoria=<?php echo $categorias['id_categoria']; ?>"
                            role="button">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </main>
    <a class="p-2 ms-5 btn btn-outline-success" href="index.php?p=admin/categorias/actions/create" role="button">Crear
        Nueva Categorias</a>

</main>

<?php
mysqli_close($connection);
?>
