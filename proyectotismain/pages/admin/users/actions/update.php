<?php
    include("database/connection.php");

    // obtener los datos del formulario
    $rut= $_POST["rut"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $id_rol = $_POST["id_rol"];

    // actualizar los datos en la base de datos
    $query = "UPDATE users SET nombre = '$nombre', apellido = '$apellido', email='$email', id_rol = '$id_rol' WHERE rut = ".$rut.";";

    // ejecutar la consulta
    $result =  mysqli_query($connection, $query);

    // redireccionar a la pagina de usuarios
    header("Location: index.php?p=admin/users/index");
?>