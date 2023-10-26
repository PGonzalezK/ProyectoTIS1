<!-- As a link -->
<?php
   require('database\conexion.php');
  
if (isset($_REQUEST['rut'])) {
    $rut = stripslashes($_REQUEST['rut']); // removes backslashes
    $rut = mysqli_real_escape_string($con, $rut); //escapes special characters in a string
    $nombre = stripslashes($_REQUEST['nombre']); // removes backslashes
    $nombre = mysqli_real_escape_string($con, $nombre); //escapes special characters in a string
    $apellido = stripslashes($_REQUEST['apellido']); // removes backslashes
    $apellido = mysqli_real_escape_string($con, $apellido); //escapes special characters in a string
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    
    echo md5($password);
    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `registro` (rut, nombre, apellido, email, password, trn_date) VALUES ('$rut', '$nombre', '$apellido', '$email', '" . md5($password) . "', '$trn_date')";
    $result = mysqli_query($con, $query);
    if ($result) {
        // header("Location: index.php");
    }
} 

?>

<nav class="navbar navbar-expand-lg bg-ligh" style="background-color: #812fc1">
    <div class="container-fluid">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <i class="fa-brands fa-instagram fa-2xl"></i>
                    <i class="fa-brands fa-facebook fa-2xl"></i>
                    <i class="fa-brands fa-x-twitter fa-2xl"></i>
                </div>
                <div class="col">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>
                <div class="col">

                    <form class="d-flex" role="search">
                        <a class="btn btn-outline-succes" href="login\iniciarsesion.php" role="button">Iniciar sesion</a>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Registrarse">
                                Registrarse
                            </button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="Registrarse" tabindex="-1" aria-labelledby="ModalRegistrarse" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalRegistrarse">Registrarse</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                      

                        // If form submitted, insert values into the database.
                        if (isset($_REQUEST['rut'])) {
                            
                        } else {
                        ?>
                            <form name="Registrarse" action="" method="post">
                                <input type="rut" name="rut" placeholder="rut" required />
                                <input type="text" name="nombre" placeholder="nombre" required />
                                <input type="text" name="apellido" placeholder="apellido" required />
                                <input type="email" name="email" placeholder="Correo" required />
                                <input type="password" name="password" placeholder="Contraseña" required />
                                <input type="submit" name="submit" value="Registrarse" />
                            </form>
                        <?php } ?>
                    </div>

                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

    </div>




</nav>


<!-- Bootstrap CSS y JS (asegúrate de incluir estas bibliotecas en tu archivo) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>