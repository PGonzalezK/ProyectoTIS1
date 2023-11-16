<?php
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
    $consulta = "SELECT * FROM dirmunicipales WHERE id = $id";
    if(!$id){
        header('Location: admin/index.php');
    }
    $resultadodir = mysqli_query($connection, $consulta);
    $direccionmunicipal = mysqli_fetch_assoc($resultadodir);     

   //almacena errores 
    $errores = [];

    $nombre = $direccionmunicipal['nombre'];
    $descripcion =$direccionmunicipal['descripcion'];
    $director = $direccionmunicipal['director'];
    $telefono = $direccionmunicipal['telefono'];
    $email = $direccionmunicipal['email'];
    $direccion = $direccionmunicipal['direccion'];
    $funciones = $direccionmunicipal['funciones'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        /*echo "<pre>";
        var_dump($_POST);
        echo "</pre>";*/
        $nombre = mysqli_real_escape_string($connection,$_POST['nombre']);
        $descripcion =mysqli_real_escape_string($connection,$_POST['descripcion']);
        $director = mysqli_real_escape_string($connection,$_POST['director']);
        $telefono = mysqli_real_escape_string($connection,$_POST['telefono']);
        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $direccion = mysqli_real_escape_string($connection,$_POST['direccion']);
        $funciones = mysqli_real_escape_string($connection,$_POST['funciones']);
        //var_dump($imagen);

        if(!$nombre){
            $errores[] ="Debes añadir un nombre a la Dirección Municipal"; 
        }
        if(strlen($descripcion)<200){
            $errores[]="Debes escribir descripcion y debe tener al menos 200 caracteres";
        }

        if(!$telefono){
            $errores[]="Debe escribir el teléfono";
        }
        if(!$email){
            $errores[]="Debe escribir el email";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores[] = "El formato de correo electrónico es inválido";
            }
        }
        if(!$direccion){
            $errores[]="Debe escribir la dirección";
        }
        if(strlen($funciones)<200){
            $errores[]="Debe escribir una descripcion y debe tener al menos 200 caracteres";
        }
        if(empty($errores)){
        //ACTUALIZAR Variables
        $query = "UPDATE dirmunicipales SET nombre = '${nombre}', descripcion = '${descripcion}', director = '${director}', 
        telefono = '${telefono}', email = '${email}', direccion = '${direccion}', funciones='${funciones}'  WHERE id = ${id}";
        //resultados
        $resultado = mysqli_query($connection,$query);

        if($resultado){
            header('Location: index.php?p=admin/direccionesMunicipales/index&resultado=1');
        }
        }
    }
?>

    <main class = "contenedor">
        <h1>Actualizacion de Direcciones Municipales:</h1>

        <?php foreach($errores as $error):?>
            <div class="p-3 mb-2 bg-danger text-white">
                <?php echo $error;?>
            </div>
        <?php endforeach;?>

        <div class="card">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                
                    <div class="col-md-12 mb-3">
                        <label for="nombre" class="form-label">Nombre de la Dirección Municipal</label>
                        <input type="text" class="form-control" id="name" name="nombre" placeholder="Escribir nombre" value="<?php echo $nombre ?>" required maxlength="200">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="input-group-text" for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" rows ='5' placeholder="escriba una breve descripcion de la Dirección Municipal" value="<?php echo $descripcion ?>"
                            required></input>
                        <div class="invalid-feedback">
                           Escriba la descripción
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="director" class="form-label">Director</label>
                        <input type="text" class="form-control" id="name" name="director" placeholder="Escribir nombre director de la Dirección Municipal" value="<?php echo $director ?>" required maxlength="200">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="name" name="telefono" placeholder="Escribir telefono" value="<?php echo $telefono ?>" required maxlength="200">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email </label>
                        <input type="text" class="form-control" id="name" name="email" placeholder="email" value="<?php echo $email ?>" required maxlength="200">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="dirección" class="form-label">Dirección </label>
                        <input type="text" class="form-control" id="name" name="direccion" placeholder="Escribir dirección" value="<?php echo $direccion ?>" required maxlength="200">
                    </div>
                    <div class="form-group">
                        <label for="funciones">Funciones de la Dirección Municipal:</label>
                        <textarea id="contenido" name="funciones" class="form-control" rows="5"><?php echo $funciones ?></textarea>
                    </div>
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
            <a class="btn btn-primary" href="index.php?p=admin/direccionesMunicipales/index" role="button">Volver</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
           
            
        
        </form>
    </div>

    </main>