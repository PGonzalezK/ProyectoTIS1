<?php
    //conectar a db
    require 'includes/config/database.php';
    $db = conectarDB();

    $errores = [];    
    //autenticar usuario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //var_dump($_POST);

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));

        //var_dump($email);
        $password =mysqli_real_escape_string($db,$_POST['password']);

        if(!$email){
            $errores[] = "El email es obligatorio o no es valido";
        }
        if(!$password){
            $errores[] = "El password es obligatorio";
        }
        if(empty($errores)){
            $query = "SELECT * FROM usuarios WHERE email = '$email';";
            $resultado = mysqli_query($db,$query);
            if($resultado -> num_rows){
                //revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                //verificar si el password es correcto
                $auth = password_verify($password,$usuario['password']);
                
                if($auth){
                    //usuario autenticado
                    session_start();
                    //llenar arreglo de la sesión
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    header('Location: admin/index.php');

                }else{
                    $errores[] = "El password es incorrecto";
                }
            }else{
                $errores[]="El usuario no existe";
            }

        }
    }

    //header
    include 'includes/funciones.php';
    incluirTemplate('header');
?>


<form class="p-2" method="POST">
    <h5>INICIAR SESIÓN:</h5>
    <?php
    foreach($errores as $error): 
    ?>
        <div class="p-3 mb-2 bg-danger text-white">
             <?php echo $error;?>
        </div>
    <?php endforeach; ?>    

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name = "password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>