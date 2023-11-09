<?php

require('database/connection.php');

/*$errores = []; 

if (isset($_POST['email'])) {

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($connection, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connection, $password);


    //verificar si la password es correcta
    $query = "SELECT * FROM `users` WHERE email='$email' and password='$password'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Autenticación exitosa
        $_SESSION['email'] = $email;
        $_SESSION['id_rol'] = $user['id_rol'];

        // Redirige al usuario según su rol
        if ($user['id_rol'] == 1) {
            header("Location: index.php?p=admin/home");
        } elseif ($user['id_rol'] == 2) {
            header("Location: index.php?p=home");
        } else {
            // Rol desconocido, manejarlo según sea necesario
            echo "Rol desconocido";
        }
    } else {
        // Autenticación fallida
        echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='index.php?p=auth/login'>Logearte</a></div>";

    }
} else {

    ?>
    <section class="ftco-section login-backg">
            <div class="container">
                <div class="row justify-content-center">
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-wrap p-0">
                            <h2 class="mb-4 text-center">Iniciar Sesion</h2>
                            <form action="" method="POST" class="signin-form">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="email" required >
                                </div>
                                <br>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="contraseña"
                                        required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" name="submit"
                                        class="form-control btn btn-primary submit px-3">iniciar
                                        sesion</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">recuerdame
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" style="color: #fff">olvidaste la contraseña?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php
}*/
//conectar a la base de datos

$errores = []; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($connection, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es válido";
    }
    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if (empty($errores)) {
        $query = "SELECT * FROM users WHERE email = '$email';";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result)) {
            $user = mysqli_fetch_assoc($result);
            $auth = password_verify($password, $user['password']);

            if ($auth) {
                session_start();
                $_SESSION['email'] = $user['email'];
                $_SESSION['id_rol'] = $user['id_rol'];

                if ($user['id_rol'] == 1) {
                    header("Location: index.php?p=admin/home");
                } elseif ($user['id_rol'] == 2) {
                    header("Location: index.php?p=home");
                } else {
                    echo "Rol desconocido";
                }
            } else {
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}
?>

<section class="ftco-section login-backg bg-center">
    <div class="container">
        <div class="row justify-content-center">
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="login-wrap p-0">
                    <h2 class="mb-4 text-center">Iniciar Sesion</h2>
                    <form action="" method="POST" class="signin-form">
                    <?php
                        foreach($errores as $error): 
                        ?>
                            <div class="p-3 mb-2 bg-danger text-white">
                                <?php echo $error;?>
                            </div>
                    <?php endforeach; ?>  
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="email" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="contraseña" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" name="submit" class="form-control btn btn-primary submit px-3">iniciar sesión</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">recuérdame
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#" style="color: #fff">¿Olvidaste la contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

