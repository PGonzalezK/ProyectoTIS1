<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

if (isset($_GET["id_rol"])) {
    $id_rol = $_GET["id_rol"];

    // Crear consulta para eliminar un registro de rol en la base de datos
    $query = "DELETE FROM roles WHERE idRol = " . $id_rol . ";";

    // Ejecutar la consulta
    $result =  mysqli_query($connection, $query);

    // Redirigir a la página de roles
    header("Location: index.php?p=admin/roles/index");
    exit();
} else {
    // Manejar el caso en el que el parámetro id_rol no está definido
    echo "El parámetro id_rol no está definido.";
}
?>
