<?php
//conectar a db
require 'includes/config/database.php';
$db = conectarDB();
//crear email y pass
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//query
$query = "INSERT INTO usuarios (email,password) VALUES ('${email}','${passwordHash}');";
echo $query;
mysqli_query($db,$query);