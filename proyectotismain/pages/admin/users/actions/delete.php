<?php

    include("database/connection.php");
    include("middleware/auth.php");

    $rut = $_GET["rut"];

    $query = "DELETE FROM users WHERE rut=".$rut.";";

    $result =  mysqli_query($connection, $query);

    if (headers_sent()) {
        die("<script > window.location.href = 'http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=admin/users/index'</script>");
    }
    else{
        exit(header("Location: index.php?p=admin/users/index"));
    }

?>