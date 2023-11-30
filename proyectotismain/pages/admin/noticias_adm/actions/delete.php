<?php
// DELETE NOTICIAS
// Conectar a la base de datos 
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

// Verificar si existe un ID
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: index.php');
}

// Eliminar la imagen del servidor
$consulta = "SELECT imagen FROM noticias WHERE idNoticia = ${id}";
$resultado = mysqli_query($connection, $consulta);
$noticia = mysqli_fetch_assoc($resultado);
$imagenAEliminar = $noticia['imagen'];
$rutaImagen = 'pages/admin/noticias_adm/imagenes/' . $imagenAEliminar;
if (file_exists($rutaImagen)) {
    unlink($rutaImagen);
}

// Eliminar las denuncias relacionadas
$queryDenuncias = "DELETE FROM denuncias WHERE id_comentario IN (SELECT id FROM comentarios WHERE id_noticia = $id)";
$resultadoDenuncias = mysqli_query($connection, $queryDenuncias);

// Eliminar las valorizaciones relacionadas
$queryValorizaciones = "DELETE FROM valorizaciones WHERE id_noticia = $id";
$resultadoValorizaciones = mysqli_query($connection, $queryValorizaciones);

// Si se eliminaron las denuncias y valorizaciones correctamente, ahora puedes eliminar la noticia
if ($resultadoDenuncias && $resultadoValorizaciones) {
    $query = "DELETE FROM noticias WHERE idNoticia = $id";
    $resultado = mysqli_query($connection, $query);

    if ($resultado) {
        if (headers_sent()) {
            die("<script > window.location.href = 'http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=admin/noticias_adm/index&resultado=3'</script>");
        } else {
            exit(header("Location: index.php?p=admin/users/index"));
        }
    } else {
        // Manejar el error al eliminar la noticia
        echo "Error al eliminar la noticia.";
    }
} else {
    // Manejar el error al eliminar las denuncias o valorizaciones
    echo "Error al eliminar las denuncias o valorizaciones relacionadas.";
}
?>
