<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

// Validar id
$id = $_GET['id_categoria'];
$id = filter_var($id, FILTER_VALIDATE_INT);
$consulta = "SELECT * FROM categoria WHERE id_categoria = $id";

if (!$id) {
    header('Location: admin/index.php');
}

$resultadoCategoria = mysqli_query($connection, $consulta);
$categoria = mysqli_fetch_assoc($resultadoCategoria);

// Almacenar errores
$errores = [];

$nombre = $categoria['nombre'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = mysqli_real_escape_string($connection, $_POST['nombre']);

    if (!$nombre) {
        $errores[] = "Debes añadir un nombre a la categoría";
    }

    if (empty($errores)) {
        // Actualizar Variables
        $query = "UPDATE categoria SET nombre = '${nombre}' WHERE id_categoria = ${id}";

        // Resultados
        $resultado = mysqli_query($connection, $query);

        if ($resultado) {
            if (headers_sent()) {
                die("<script>window.location.href = 'http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=admin/categorias/categorias&resultado=2'</script>");
            } else {
                exit(header("Location: index.php?p=admin/users/index"));
            }
        }
    }
}
?>

<main class="contenedor">
    <div class="container-fluid border-bottom border-top bg-body-tertiary">
        <div class="p-5 rounded text-center">
            <h2 class="fw-normal">Actualizar Categoría</h1>
        </div>
    </div>

    <?php foreach ($errores as $error): ?>
        <div class="p-3 mb-2 bg-danger text-white">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="card ms-5 me-5 mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="nombre" class="form-label">Nombre de la Categoría</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribir nombre" value="<?php echo $nombre ?>" required maxlength="200">
                    </div>
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <a class="btn btn-primary" href="index.php?p=admin/categorias/categorias" role="button">Volver</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</main>
