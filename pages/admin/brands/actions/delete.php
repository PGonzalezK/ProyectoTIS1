<?php
echo "asdfasd";
    include("../../../../database/connection.php");

    $id = $_GET["id"];

    $query = "DELETE FROM marcas WHERE id=".$id.";";

    $result =  mysqli_query($connection, $query);

    header("Location: ../../../../index.php?p=admin/brands/index");
?>