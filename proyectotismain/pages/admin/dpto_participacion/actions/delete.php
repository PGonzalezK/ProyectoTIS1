<?php
    include("database/connection.php");
    include("middleware/auth.php");

    $id = $_GET["id"];

    $query = "DELETE FROM departamento_participacion WHERE id=".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: index.php?p=admin/dpto_participacion/index");
?>