<?php
    //conectar a la base de datos
    include("middleware/auth.php");
    include("database/connection.php");

    if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
    }

    //Verificar si existe un ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: index.php');
    }

    //Eliminar el evento
    $query = "DELETE FROM dirmunicipales WHERE id = ${id}";
    $resultado = mysqli_query($connection, $query);

    if($resultado){
        header('Location: index.php?p=admin/direccionesMunicipales/index&resultado=3');
    }
?>