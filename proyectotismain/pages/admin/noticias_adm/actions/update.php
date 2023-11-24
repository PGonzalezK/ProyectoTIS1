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
    

    $consulta = "SELECT * FROM noticias WHERE idNoticia = $id";

    $resultadoNoticia = mysqli_query($connection, $consulta);
    $noticia = mysqli_fetch_assoc($resultadoNoticia); 

    //consulta para obtener periodistas
    $consultaEditor = "SELECT * FROM users WHERE  id_rol= 3";
    $resultadoEditor = mysqli_query($connection, $consultaEditor);

    //almacena errores 
    $errores = [];

    $titulo = $noticia['titulo'];
    $descripcion = $noticia['descripcion'];
    $imagenEvento = $noticia['imagen'];
    $idEditor = $noticia['id_editor'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = mysqli_real_escape_string($connection, $_POST['titulo']);
        $idEditor = mysqli_real_escape_string($connection,$_POST['id_editor']);
        $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion']);
        
        //asignar files a una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes añadir un título al evento"; 
        }
        if(strlen($descripcion) < 50){
            $errores[] = "Debes escribir una descripción del evento con al menos 200 caracteres";
        }

        //validar por peso de imagen
        $medida = 1000000;
        if($imagen['size'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }

        if(empty($errores)){
            $carpetaImagenes = 'pages/admin/noticias_adm/imagenes/';

            $nombreImagen =' ';

            if($imagen['name']){
                //eliminar imagen almacenada previamente
                  unlink($carpetaImagenes . $noticia['imagen']);
                //generar nombre único para la imagen
                    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                //subir imagen
                    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen); 
            } 
            else {
                 $nombreImagen = $noticia['imagen'];
            }
            //Actualizar variables
            $query = "UPDATE noticias SET titulo = '${titulo}',id_editor = ${idEditor}, imagen = '${nombreImagen}', 
            descripcion = '${descripcion}'  WHERE idNoticia = ${id}";
            $resultado = mysqli_query($connection, $query);
    
            if($resultado){
                if (headers_sent()) {
                    die("<script > window.location.href = 'http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=admin/noticias_adm/index&resultado=2'</script>");
                }
                else{
                    exit(header("Location: index.php?p=admin/users/index"));
                }
            }
        }
    }
?>

<main class="contenedor">
    <div class="container-fluid border-bottom border-top bg-body-tertiary">
            <div class=" p-5 rounded text-center">
            <h2 class="fw-normal">Actualizar Noticia</h1>
            </div>
        </div>

    <?php foreach($errores as $error): ?>
        <div class="p-3 mb-2 bg-danger text-white">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="card ms-5 mt-5 me-5 m">
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="titulo" class="form-label">Titulo de la noticia</label>
                        <input type="text" class="form-control" id="name" name="titulo" placeholder="Escribir titulo" value="<?php echo $titulo ?>" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="idEditor" class="form-label">Nombre Periodista</label>
                        <select class="form-control" id="origin" name="id_editor">
                            <?php while($editor = mysqli_fetch_assoc($resultadoEditor)): ?>
                                <option value="<?php echo $editor['id']; ?>" <?php if ($editor['id'] == $idEditor) echo 'selected'; ?>>
                                    <?php echo $editor['nombre'] . " " . $editor['apellido']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="image" accept="image/png, image/jpeg" name="imagen">
                        <img src="pages/admin/noticias_adm/imagenes/<?php echo $imagenEvento; ?>" alt="" width="300">
                    </div>
                    <div class="mb-3">
                        <label class="input-group-text" for="descripcion">DESCRIPCIÓN</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Escriba una breve descripcion" value="<?php echo $descripcion ?>" required>
                        <div class="invalid-feedback">
                            ESCRIBA BREVE DESCRIPCION DEL EVENTO
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <a class="btn btn-primary" href="index.php?p=admin/noticias_adm/index" role="button">Volver</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</main>