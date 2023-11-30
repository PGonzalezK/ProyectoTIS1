<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

//Verificar si existe un ID
$id = $_GET['id_categoria'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: index.php?p=admin/categorias/categorias&resultado=error');
    exit();
}

//Eliminar el evento
$query = "DELETE FROM categoria WHERE id_categoria = $id";
$resultado = mysqli_query($connection, $query);

if ($resultado) {
    if (headers_sent()) {
        echo "<script>window.location.href = 'http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=admin/categorias/categorias'</script>";
        exit();
    } else {
        header("Location: index.php?p=admin/users/index");
        exit();
    }
} else {
    echo "Error al eliminar la categoría: " . mysqli_error($connection);
    exit();
}
?>
