<?php
include("database/connection.php");
include_once 'includes/funciones/funciones.php';

$email_usuario = obtenerEmailUsuarioActual();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    $noticia = obtenerNoticiaPorId($connection, $id);

    if ($noticia) {
        incrementarVisitas($connection, $id);

        $accion = null;

        if ($email_usuario) {
            $accion = obtenerAccionUsuario($connection, $email_usuario, $id);
        }
    } else {
        header('Location: ../../../index.php');
        exit();
    }
} else {
    header('Location: ../../../index.php');
    exit();
}

?>

<?php require('includes/users/navbar_users.php'); ?>