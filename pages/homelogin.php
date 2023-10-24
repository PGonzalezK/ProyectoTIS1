<?php
  include("login\auth.php"); 
 ?>
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
  </head>
  <body>
    <div class="form">
      <p>Bienvenid@ <b><?php echo $_SESSION['rut']; ?></b>!</p>
      <p>Acabas de iniciar sesión</p>
      <a href="login\logout.php">Cerrar Sesión</a>
    </div>
  </body>
</html>
