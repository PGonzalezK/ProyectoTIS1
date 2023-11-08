<?php 
    //conectar a la base de datos
    include("middleware/auth.php");
    include("database/connection.php");
   
    if ($_SESSION['id_rol'] !== '1') {
       // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
       header("Location: index.php");
       exit();
    }
    //Validar id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: admin/index.php');
    }
    

    $consulta = "SELECT * FROM palabrasalcalde WHERE id = $id";

    $resultadoalcalde = mysqli_query($connection, $consulta);
    $alcalde = mysqli_fetch_assoc($resultadoalcalde); 


    //almacena errores 
    $errores = [];

    $titulo = $alcalde['titulo'];
    $contenido = $alcalde['contenido'];
    $nombre_alcalde = $alcalde['nombre_alcalde'];
    $imagenAlcalde = $alcalde['imagen'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = mysqli_real_escape_string($connection, $_POST['titulo']);
        $contenido = mysqli_real_escape_string($connection, $_POST['contenido']);
        $nombre_alcalde = mysqli_real_escape_string($connection, $_POST['nombre_alcalde']);
        //asignar files a una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes añadir un título "; 
        }
        if(!$nombre_alcalde){
            $errores[] = "Debes escribir nombre";
        }
        if(strlen($contenido) < 50){
            $errores[] = "Debes escribir un contenido con al menos 50 caracteres";
        }

        //validar por peso de imagen
        $medida = 1000000;
        if($imagen['size'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }

        if(empty($errores)){
            $carpetaImagenes = 'pages/admin/palabras_alcalde/imagen/';
             if(!is_dir($carpetaImagenes)){
                 mkdir($carpetaImagenes);
                }        
            if($imagen['name']){
                //eliminar imagen almacenada previamente
                  unlink($carpetaImagenes . $alcalde['imagen']);
                //generar nombre único para la imagen
                $rutaImagen = $carpetaImagenes . "/alcalde-foto.jpg";
               //subir imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/alcalde-foto.jpg");
            } 
            else {
                 $rutaImagen = $alcalde['imagen'];
            }
            //Actualizar variables
            $query = "UPDATE palabrasalcalde SET titulo = '${titulo}', contenido= '${contenido}', nombre_alcalde = '${nombre_alcalde}', 
            imagen = '${rutaImagen}'   WHERE id = ${id}";
            $resultado = mysqli_query($connection, $query);
    
            if($resultado){
                header('Location: index.php?p=admin/palabras_alcalde/index&resultado=2');
            }
        }
    }
?>


<main class="container mt-5">
    <?php foreach($errores as $error): ?>
            <div class="p-3 mb-2 bg-danger text-white">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

    <div class="card">
        <form action=" " method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $titulo; ?>">
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea id="contenido" name="contenido" class="form-control" rows="5"><?php echo $contenido; ?></textarea>
            </div>
            <div class="form-group">
                <label for="nombre_alcalde">Nombre del Alcalde:</label>
                <input type="text" id="nombre_alcalde" name="nombre_alcalde" class="form-control" value="<?php echo $nombre_alcalde; ?>">
            </div>
            <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="image" accept="image/png, image/jpeg" name="imagen">
                        <img src="pages/admin/palabras_alcalde/imagen/<?php echo $imagenEvento; ?>" alt="" width="300">
                    </div>
            <button type="submit" name="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</main>