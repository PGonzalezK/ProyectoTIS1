<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

$errores = [];
 
$titulo = '';
$contenido = '';
$nombre_alcalde = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titulo = mysqli_real_escape_string($connection,$_POST['titulo']);
    $contenido = mysqli_real_escape_string($connection,$_POST['contenido']);
    $nombre_alcalde = mysqli_real_escape_string($connection,$_POST['nombre_alcalde']);
    $fecha = date('Y/m/d');

    $imagen = $_FILES['imagen'];
    if(!$titulo){
        $errores[] ="Debes añadir un titulo"; 
    }
    if(!$nombre_alcalde){
        $errores[] = "Debes escribir un nombre";
    }
    if(strlen($contenido)<50){
        $errores[]="Debes escribir contenido y debe tener al menos 50 caracteres";
    }

    if(!$imagen['name']){
        $errores[]="Debe subir una imagen";
    }

    //validar por peso de imagen
    $medida = 1000*1000;
    if($imagen['size']> $medida){
        $errores[] = "La imagen es muy pesada";
    }

    if(empty($errores)){

        $carpetaImagenes = 'pages/admin/palabras_alcalde/imagen/';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

        //subir imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/alcalde-foto.jpg");
        
        $rutaImagen = $carpetaImagenes . "/alcalde-foto.jpg";
        
        //Insertar Variables
        $query = "INSERT INTO palabrasalcalde (titulo , contenido, nombre_alcalde, imagen, fecha) VALUES ('$titulo','$contenido','$nombre_alcalde','$rutaImagen','$fecha')";
        
        //resultados
        $resultado = mysqli_query($connection,$query);
        if($resultado){
            header('Location: index.php?p=admin/palabras_alcalde/index');
        }
    }
}
?>

<div class="container-fluid border-bottom bordere-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Editor de Palabras del Alcalde</h2>
    </div>
</div>

<main class="container mt-5">
        <?php foreach($errores as $error):?>
                <div class="p-3 mb-2 bg-danger text-white">
                    <?php echo $error;?>
                </div>
        <?php endforeach;?>
    <div class="card">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea id="contenido" name="contenido" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="nombre_alcalde">Nombre del Alcalde:</label>
                <input type="text" id="nombre_alcalde" name="nombre_alcalde" class="form-control" value="">
            </div>
            <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="image" accept="image/png, image/jpeg"  name = "imagen">
                    </div>
            <button type="submit" name="submit" class="btn btn-primary">Agregar palabras</button>
        </form>
    </div>
</main>
