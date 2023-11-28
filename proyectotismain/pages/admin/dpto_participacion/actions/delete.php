<?php
    include("database/connection.php");
    include("middleware/auth.php");

    $id = $_GET["id"];

    $query = "DELETE FROM departamento_participacion WHERE id=".$id.";";

    $result =  mysqli_query($connection, $query);
    if (headers_sent()) {
        die("<script > window.location.href = 'http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=admin/dpto_participacion/index'</script>");
    }
    else{
        exit(header("Location: index.php?p=admin/users/index"));
    }

?>