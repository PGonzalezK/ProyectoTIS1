<?php

function conectarDB(){
    $db = mysqli_connect('localhost','root','','bdproyecto');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }

    if(!$db){
        echo "Error al conectar";
        exit;
    }
    return $db;

 }