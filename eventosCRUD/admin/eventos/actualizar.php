<?php 
    require '../../includes/funciones.php';
    $auth = estaAutentificado();


    //Validar id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: admin/index.php');
    }
    
    require '../../includes/config/database.php';
    $db = conectarDB();

    $consulta = "SELECT * FROM eventos WHERE idEvento = $id";

    $resultadoEvento = mysqli_query($db, $consulta);
    $eventos = mysqli_fetch_assoc($resultadoEvento); 

    //consulta para obtener periodistas
    $consultaPeriodistas = "SELECT * FROM periodistas";
    $resultadoPeriodistas = mysqli_query($db, $consultaPeriodistas);

    //almacena errores 
    $errores = [];

    $titulo = $eventos['titulo'];
    $direccion = $eventos['direccion'];
    $descripcion = $eventos['descripcion'];
    $imagenEvento = $eventos['imagen'];
    $idPeriodista = $eventos['idPeriodista'];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $direccion = mysqli_real_escape_string($db, $_POST['direccion']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $idPeriodista = mysqli_real_escape_string($db,$_POST['idPeriodista']);
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
            $carpetaImagenes = '../../imagenes/';

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
            descripcion = '${descripcion}', idPeriodista = ${idPeriodista}   WHERE idEvento = ${id}";
            $resultado = mysqli_query($db, $query);
    
            if($resultado){
                header('Location: ../index.php?resultado=2');
            }
        }
    }

 
    incluirTemplate('header');
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
                        <img src="../../imagenes/<?php echo $imagenEvento; ?>" alt="" width="300">
                    </div>
                    <div class="mb-3">
                        <label class="input-group-text" for="descripcion">DESCRIPCIÓN</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Escriba una breve descripcion" value="<?php echo $descripcion ?>" required>
                        <div class="invalid-feedback">
                            ESCRIBA BREVE DESCRIPCION DEL EVENTO
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="idPeriodista" class="form-label">Nombre Periodista</label>
                        <select class="form-control" id="origin" name="idPeriodista">
                            <?php while($periodista = mysqli_fetch_assoc($resultadoPeriodistas)): ?>
                                <option value="<?php echo $periodista['idPeriodista']; ?>" <?php if ($periodista['idPeriodista'] == $idPeriodista) echo 'selected'; ?>>
                                    <?php echo $periodista['nombre'] . " " . $periodista['apellido']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <a class="btn btn-primary" href="../index.php" role="button">Volver</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</main>

<?php
    incluirTemplate('footer');
?>
