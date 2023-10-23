<!-- As a link -->
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
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal"
                            data-bs-target="#IniciarSesion">
                            Iniciar Sesion
                        </button>
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                            data-bs-target="#Registrarse">
                            Registrarse
                        </button>
                    </form>
                </div>
            </div>
        </div>

    <!-- Modal -->
    <div class="modal fade" id="IniciarSesion" tabindex="-1" aria-labelledby="ModalIniciarsesion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 " id="ModalIniciarsesion">Iniciar Sesion</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <?php
                    require('database\conexion.php');
                    session_start();
                    if (isset($_POST['rut'])) {

                        $username = stripslashes($_REQUEST['rut']); // removes backslashes
                        $username = mysqli_real_escape_string($con, $rut); //escapes special characters in a string
                        $password = stripslashes($_REQUEST['password']);
                        $password = mysqli_real_escape_string($con, $password);

                        //Checking is user existing in the database or not
                        $query = "SELECT * FROM `registro` WHERE rut='$rut' and password='" . md5($password) . "'";
                        $result = mysqli_query($con, $query) or die(mysql_error());
                        $rows = mysqli_num_rows($result);
                        if ($rows == 1) {
                            $_SESSION['rut'] = $rut;
                            header("Location: pages\homelogin.php"); // Redirect user to index.php
                        } else {
                            echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='login.php'>Logearte</a></div>";
                        }
                    } else {
                        ?>

                        <div class="form">
                            <form action="" method="post" name="login">
                                <input type="rut" name="rut" placeholder="rut" required />
                                <input type="password" name="password" placeholder="Contraseña" required />
                                <input name="submit" type="submit" value="Entrar" />
                            </form>
                        <?php } ?>
                    </div>

                </div>
                <div class="modal-footer">

                </div>
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
                        require('database\conexion.php');
                        
                        // If form submitted, insert values into the database.
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
                            $trn_date = date("Y-m-d H:i:s");
                            $query = "INSERT into `registro` (rut, nombre, apellido, email, password, trn_date) VALUES ('$rut', '$nombre', '$apellido', '$email', '" . md5($password) . "', '$trn_date')";
                            $result = mysqli_query($con, $query);
                            if ($result) {
                                header("Location: home.php");
                            }
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