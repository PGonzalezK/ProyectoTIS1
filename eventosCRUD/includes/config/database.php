<?php

function conectarDB(){
    $db = mysqli_connect('localhost','root','','bdproyecto');


    if(!$db){
        echo "Error al conectar";
        exit;
    }
    return $db;

 }