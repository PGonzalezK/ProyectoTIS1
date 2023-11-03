<?php 
    require '../../includes/config/database.php';
    $db = conectarDB();

    //consulta para obtener periodistas
    $consulta = "SELECT * FROM periodistas";
    $resultado = mysqli_query($db, $consulta);



   //almacena errores 
    $errores = [];

    $titulo = '';
    $direccion ='';
    $descripcion ='';
    $idPeriodista = '';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        /*echo "<pre>";
        var_dump($_POST);
        echo "</pre>";*/
        

        $titulo = mysqli_real_escape_string($db,$_POST['titulo']);
        $direccion =mysqli_real_escape_string($db,$_POST['direccion']);
        $descripcion =mysqli_real_escape_string($db,$_POST['descripcion']);
        $idPeriodista = mysqli_real_escape_string($db,$_POST['idPeriodista']);
        $creado = date('Y/m/d');

        //asignar files a una variable
        $imagen = $_FILES['imagen'];
        
        //var_dump($imagen);

        if(!$titulo){
            $errores[] ="Debes añadir un titulo al evento"; 
        }
        if(!$direccion){
            $errores[] = "Debes escribir la dirección del evento";
        }
        if(strlen($descripcion)<50){
            $errores[]="Debes escribir descripcion del evento y debe tener al menos 50 caracteres";
        }

        if(!$imagen['name']){
            $errores[]="Debe subir una imagen";
        }

        //validar por peso de imagen
        $medida = 1000*1000;
        if($imagen['size']> $medida){
            $errores = "La imagen es muy pesada";
        }

        if(empty($errores)){
            $carpetaImagenes = '../../imagenes/';
            
            //generar nombre único imagenes
            $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

            //subir imagenes
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            
        //Insertar Variables
        $query = "INSERT INTO eventos (titulo , direccion, imagen, descripcion, creado, idPeriodista) VALUES ('$titulo','$direccion','$nombreImagen','$descripcion','$creado', '$idPeriodista')";
        //resultados
        $resultado = mysqli_query($db,$query);

        if($resultado){
            header('Location: ../index.php?resultado=1');
        }
        }
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class = "contenedor">
        <h1>Creacion de evento:</h1>

        <?php foreach($errores as $error):?>
            <div class="p-3 mb-2 bg-danger text-white">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>

        <div class="card">
        <form action="../eventos/crear.php" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control" type="file" id="image" accept="image/png, image/jpeg"  name = "imagen">
                    </div>

                    <div class="mb-3">
                        <label class="input-group-text" for="descripcion">DESCRIPCIÓN</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="escriba una breve descripcion" value="<?php echo $descripcion ?>"
                            required></input>
                        <div class="invalid-feedback">
                           ESCRIBA BREVE DESCRIPCION DEL EVENTO
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="idPeriodista" class="form-label">Nombre Periodista</label>
                        <select class="form-control" id="origin" name ="idPeriodista" >
                            <?php while($idPeriodista = mysqli_fetch_assoc($resultado)):;?>
                            <option value="<?php echo $idPeriodista['idPeriodista'];?>"><?php echo $idPeriodista['nombre']." ". $idPeriodista['apellido'];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>

                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <a class="btn btn-primary" href="../index.php" role="button">Volver</a>
            
        
        </form>
    </div>

    </main>

    <?php
        incluirTemplate('footer');
    ?>