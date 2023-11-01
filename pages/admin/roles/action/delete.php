<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$id_rol = $_GET["id_rol"];

$query = "DELETE FROM rol WHERE id_rol=".$id_rol.";";

$result =  mysqli_query($connection, $query);

header("Location: index.php?p=admin/roles/index");
?>