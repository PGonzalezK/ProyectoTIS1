
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
      require('C:\xampp\htdocs\xampp\ProyectoTIS1\database\conexion.php');
      
         if (isset($_POST['rut'])){
      	
      	$rut = stripslashes($_REQUEST['rut']); // removes backslashes
      	$rut = mysqli_real_escape_string($con, $rut); //escapes special characters in a string
      	$password = stripslashes($_REQUEST['password']);
      	$password = mysqli_real_escape_string($con, $password);
		
      	
      //Checking is user existing in the database or not
        $query = "SELECT * FROM `registro` WHERE rut='$rut' and password='" . md5($password) . "'";
      	$result = mysqli_query($con, $query) or die(mysqli_error($con));
      	$rows = mysqli_num_rows($result);

		echo $rows;

        if($rows==1){
      		$_SESSION['rut'] = $rut;
      		//header("Location: ..\index2.php"); // Redirect user to index.php
        }else{
      		// echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='login.php'>Logearte</a></div>";
      	}
        }else{
        ?>
	    <div class="form">
	      <h1>Inicia Sesión</h1>
	      <form action="" method="post" name="login">
	        <input type="text" name="rut" placeholder="Usuario" required />
	        <input type="password" name="password" placeholder="Contraseña" required />
	        <input name="submit" type="submit" value="Entrar" />
	      </form>
	      <p>No estas registrado aún? <a href='registration.php'>Registrate Aquí</a></p>
	    </div>
    <?php } ?>
  </body>
</html>

