<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

// Procesar el formulario de carga de imágenes
if (isset($_POST['submit'])) {
    if (isset($_FILES['login_bg']) && isset($_FILES['register_bg'])) {
        // Ruta donde se guardarán las imágenes de fondo (ajústala según tu estructura de carpetas)
        $uploadDir = "uploads/";

        // Obtener nombres de archivo
        $loginBgName = $_FILES['login_bg']['name'];
        $registerBgName = $_FILES['register_bg']['name'];

        // Mover las imágenes de fondo cargadas a la carpeta de carga
        move_uploaded_file($_FILES['login_bg']['tmp_name'], $uploadDir . $loginBgName);
        move_uploaded_file($_FILES['register_bg']['tmp_name'], $uploadDir . $registerBgName);

        // Actualizar las URLs de las imágenes en la base de datos
        $updateQuery = "UPDATE backgrounds SET login_background = '$uploadDir$loginBgName', register_background = '$uploadDir$registerBgName' WHERE id = 1";
        mysqli_query($connection, $updateQuery);
    }
}
?>

<!-- Formulario para cargar imágenes de fondo -->
<div class="container">
    <h1>Configuración de Imágenes de Fondo</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="login_bg">Imagen de Fondo para el Login</label>
            <input type="file" name="login_bg">
        </div>
        <div class="form-group">
            <label for="register_bg">Imagen de Fondo para el Registro</label>
            <input type="file" name="register_bg">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>