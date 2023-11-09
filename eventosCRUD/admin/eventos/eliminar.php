<?php
    //conectar a la base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Verificar si existe un ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: ../index.php');
    }

    //Elimina la imagen del servidor
    $consulta = "SELECT imagen FROM eventos WHERE idEvento = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $evento = mysqli_fetch_assoc($resultado);
    $imagenAEliminar = $evento['imagen'];
    $rutaImagen = '../../imagenes/' . $imagenAEliminar;
    if(file_exists($rutaImagen)) {
        unlink($rutaImagen);
    }

    //Eliminar el evento
    $query = "DELETE FROM eventos WHERE idEvento = ${id}";
    $resultado = mysqli_query($db, $query);

    if($resultado){
        header('Location: ../index.php?resultado=3');
    }
?>




