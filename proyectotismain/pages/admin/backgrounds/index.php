
<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$query = "SELECT login_background FROM backgrounds WHERE id = 1"; 
$result = mysqli_query($connection, $query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se envió una imagen de fondo para el inicio de sesión
    if (isset($_FILES['login_bg']) && $_FILES['login_bg']['error'] === UPLOAD_ERR_OK) {
        

        // Actualiza la base de datos con la nueva ruta de la imagen
        $new_login_bg = 'ruta_de_la_nueva_imagen.jpg'; 
        $update_query = "UPDATE backgrounds SET login_background = '$new_login_bg' WHERE id = 1"; 
        $result = mysqli_query($connection, $update_query);
        if (!$result) {
            // Manejar el error en caso de que la actualización de la base de datos falle
        }
    }

    // Redirige al administrador a la página de configuración de imágenes de fondo
    header("Location: index.php?p=admin/backgrounds/index");
    exit();
}

?>

<!-- Formulario para cargar imágenes de fondo -->
<div class="container-fluid border-bottom border-top bg-body-tertiary">
        <div class=" p-5 rounded text-center">
            <h2 class="fw-normal">Configuración de Imágenes de Fondo</h1>
        </div>
    </div>
<div class="container mt-5">

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="login_bg">Imagen de Fondo para el Login</label>
            <input type="file" name="login_bg">
        </div>
        <div class="form-group">
            <label for="register_bg">Imagen de Fondo para el Registro</label>
            <input type="file" name="register_bg">
        </div>
        <button type="submit" name="submit" class="btn btn-outline-success mt-2">Guardar</button>
    </form>
</div>