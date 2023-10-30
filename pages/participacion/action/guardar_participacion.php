<?php

include("middleware/auth.php");
include("database/connection.php");

$tipo_contribucion = $_POST["tipo_contribucion"];
$departamento = $_POST["departamento"];
$descripcion = $_POST["descripcion"];
$otro_dpto_text = $_POST["otro_dpto_text"];

$insert = "INSERT INTO participacion (tipo_contribucion, departamento, descripcion, otro_dpto_text)
VALUES ('$tipo_contribucion', '$departamento', '$descripcion', '$otro_dpto_text');";
$resultado = mysqli_query($connection, $insert);

header("Location: ..\participacion\participacion.php");
?>