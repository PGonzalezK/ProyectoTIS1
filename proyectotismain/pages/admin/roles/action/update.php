<?php
    include("database/connection.php");

    if ($_SESSION['id_rol'] !== '1') {
        // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }

    // obtener los datos del formulario
    $id_rol= $_POST["idRol"];
    $nombreRol = $_POST["nombreRol"];

    // actualizar los datos en la base de datos
    $query = "UPDATE roles SET nombreRol = '$nombreRol' WHERE idRol = ".$id_rol.";";

    // ejecutar la consulta
    $result =  mysqli_query($connection, $query);

    // redireccionar a la pagina de roles

    if (headers_sent()) {
        die("<script > window.location.href = 'http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=admin/roles/index'</script>");
    }
    else{
        exit(header("Location: index.php?p=admin/users/index"));
    }
?>
