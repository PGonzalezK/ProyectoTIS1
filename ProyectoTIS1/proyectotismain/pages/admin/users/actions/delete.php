<?php
    include("database/connection.php");
    include("middleware/auth.php");

    $rut = $_GET["rut"];

    $query = "DELETE FROM users WHERE rut=".$rut.";";

    $result =  mysqli_query($connection, $query);

    header("Location: index.php?p=admin/users/index");
?>