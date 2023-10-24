<?php
session_start();
if(!isset($_SESSION["rut"])){
header("Location: iniciarsesion.php");
exit(); }
?>
