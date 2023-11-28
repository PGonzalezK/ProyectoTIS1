<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}


//consulta para obtener periodistas
    $consulta = "SELECT * FROM users WHERE  id_rol= 3";
    $resultado = mysqli_query($connection, $consulta);


   //almacena errores 
    $errores = [];

    $titulo = '';
    $descripcion ='';
    $idEditor = '';


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        /*echo "<pre>";
        var_dump($_POST);
        echo "</pre>";*/
        

        $titulo = mysqli_real_escape_string($connection,$_POST['titulo']);
        $descripcion =mysqli_real_escape_string($connection,$_POST['descripcion']);
        $idEditor = mysqli_real_escape_string($connection,$_POST['id_editor']);
        $creado = date('Y/m/d H:i:s');

        //asignar files a una variable
        $imagen = $_FILES['imagen'];
        
        //var_dump($imagen);

        if(!$titulo){
            $errores[] ="Debes añadir un titulo al evento"; 
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
            $errores[] = "La imagen es muy pesada";
        }

        if(empty($errores)){
            $carpetaImagenes = 'pages/admin/noticias_adm/imagenes/';
            
            //generar nombre único imagenes
            $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

            //subir imagenes
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            
        //Insertar Variables
        $query = "INSERT INTO noticias (titulo ,descripcion, imagen,creado, id_editor) VALUES ('$titulo','$descripcion','$nombreImagen','$creado', '$idEditor')";
        
        //resultados
        $resultado = mysqli_query($connection,$query);

        if($resultado){
            if (headers_sent()) {
                die("<script > window.location.href = 'http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=admin/noticias_adm/index&resultado=1'</script>");
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
            <h2 class="fw-normal">Registro de Nueva Noticia</h1>
        </div>
    </div>

    <?php foreach($errores as $error):?>
    <div class="p-3 mb-2 bg-danger text-white">
        <?php echo $error;?>
    </div>
    <?php endforeach;?>

    <div class="card ms-5 me-5 mt-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label for="titulo" class="form-label">Titulo de la Noticia</label>
                        <input type="text" class="form-control" id="name" name="titulo" placeholder="Escribir titulo"
                            value="<?php echo $titulo ?>" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="idEditor" class="form-label">Nombre Periodista</label>
                        <select class="form-control" id="origin" name="id_editor">
                            <?php
                                while ($editor = mysqli_fetch_assoc($resultado)) : 
                                ?>
                            <option value="<?php echo $editor['id']; ?>">
                                <?php echo $editor['nombre'] . " " . $editor['apellido']; ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="image" accept="image/png, image/jpeg" name="imagen">
                    </div>

                    <div class="mb-3">
                        <label class="input-group-text" for="descripcion">Descripción</label>
                        <input type="text" class="form-control col-md-12" name="descripcion"
                            placeholder="escriba una breve descripcion" value="<?php echo $descripcion ?>"
                            required></input>
                        <div class="invalid-feedback">
                            Escriba la noticia
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <a class="btn btn-primary" href="index.php?p=admin/noticias_adm/index" role="button">Volver</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>



        </form>
    </div>

</main>