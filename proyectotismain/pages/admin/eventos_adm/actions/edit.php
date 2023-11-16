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
    

    $consulta = "SELECT * FROM eventos WHERE idEvento = $id";

    $resultadoEvento = mysqli_query($connection, $consulta);
    $eventos = mysqli_fetch_assoc($resultadoEvento); 

    //consulta para obtener periodistas
    $consultaEditor = "SELECT * FROM users WHERE  id_rol= 3";
    $resultadoEditor = mysqli_query($connection, $consultaEditor);

    //almacena errores 
    $errores = [];

    $titulo = $eventos['titulo'];
    $direccion = $eventos['direccion'];
    $descripcion = $eventos['descripcion'];
    $imagenEvento = $eventos['imagen'];
    $idEditor = $eventos['id_editor'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = mysqli_real_escape_string($connection, $_POST['titulo']);
        $direccion = mysqli_real_escape_string($connection, $_POST['direccion']);
        $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion']);
        $idEditor = mysqli_real_escape_string($connection,$_POST['id_editor']);
        //asignar files a una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores[] = "Debes añadir un título al evento"; 
        }
        if(!$direccion){
            $errores[] = "Debes escribir la dirección del evento";
        }
        if(strlen($descripcion) < 50){
            $errores[] = "Debes escribir una descripción del evento con al menos 50 caracteres";
        }

        //validar por peso de imagen
        $medida = 1000000;
        if($imagen['size'] > $medida){
            $errores[] = "La imagen es muy pesada";
        }

        if(empty($errores)){
            $carpetaImagenes = 'pages/admin/eventos_adm/imagenes/';

            $nombreImagen =' ';

            if($imagen['name']){
                //eliminar imagen almacenada previamente
                  unlink($carpetaImagenes . $eventos['imagen']);
                //generar nombre único para la imagen
                    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                //subir imagen
                    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen); 
            } 
            else {
                 $nombreImagen = $eventos['imagen'];
            }
            //Actualizar variables
            $query = "UPDATE eventos SET titulo = '${titulo}', direccion = '${direccion}', imagen = '${nombreImagen}', 
            descripcion = '${descripcion}', id_editor = ${idEditor}   WHERE idEvento = ${id}";
            $resultado = mysqli_query($connection, $query);
    
            if($resultado){
                header('Location: index.php?p=admin/eventos_adm/index&resultado=2');
            }
        }
    }
?>

<main class="contenedor">
    <h1>Actualizar evento:</h1>

    <?php foreach($errores as $error): ?>
        <div class="p-3 mb-2 bg-danger text-white">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="card">
        <form method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="titulo" class="form-label">Titulo del Evento</label>
                        <input type="text" class="form-control" id="name" name="titulo" placeholder="Escribir titulo" value="<?php echo $titulo ?>" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="direccion" class="form-label">Direccion del Evento</label>
                        <input type="text" class="form-control" id="name" name="direccion" placeholder="Barros Arana 1068, 4070053 Concepción, Bío Bío" value="<?php echo $direccion ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="image" accept="image/png, image/jpeg" name="imagen">
                        <img src="pages/admin/eventos_adm/imagenes/<?php echo $imagenEvento; ?>" alt="" width="300">
                    </div>
                    <div class="mb-3">
                        <label class="input-group-text" for="descripcion">DESCRIPCIÓN</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Escriba una breve descripcion" value="<?php echo $descripcion ?>" required>
                        <div class="invalid-feedback">
                            ESCRIBA BREVE DESCRIPCION DEL EVENTO
                        </div>
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
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <a class="btn btn-primary" href="index.php?p=admin/eventos_adm/index" role="button">Volver</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</main>

