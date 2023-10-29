<?php

include("database/connection.php");
include("middleware/auth.php");


$nombre_recibido = $_POST["nombre"];
$apellido_recibido = $_POST["apellido"];
$password_recibido  = $_POST["password"];
$email_recibido = $_POST["email"];


$insert = "UPDATE users SET nombre = '$nombre_recibido', apellido = '$apellido_recibido', password = '$password_recibido', email = '$email_recibido'";
$respuesta = mysqli_query($connection, $insert);
header("Location: index.php");
?>