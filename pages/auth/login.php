<?php

require('database/connection.php');

if (isset($_POST['rut'])) {

    $rut = stripslashes($_REQUEST['rut']);
    $rut = mysqli_real_escape_string($connection, $rut);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM `users` WHERE rut='$rut' and password='$password'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Autenticación exitosa
        $_SESSION['rut'] = $rut;
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



        /*require('database/connection.php');

        if (isset($_POST['rut'])) {

            $rut = stripslashes($_REQUEST['rut']); // removes backslashes
            $rut = mysqli_real_escape_string($connection, $rut); //escapes special characters in a string
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($connection, $password);


            //Checking is user existing in the database or not
            $query = "SELECT * FROM `users` WHERE rut='$rut' and password='$password'";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed: " . mysqli_error($connection));
            }

            $user = mysqli_num_rows($result);

            // Después de verificar las credenciales del usuario en auth/login.php
            if ($user == 1) {
                
                // Autenticación exitosa
                $_SESSION['rut'] = $rut;

                // Consulta la base de datos para obtener el id_rol del usuario
                $query = "SELECT id_rol FROM users WHERE rut = '$rut'";
                $result = mysqli_query($connection, $query);

                if ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['id_rol'] = $row['id_rol'];
                }

                // Redirige al usuario a la página de inicio
                header("Location: index.php?p=admin/home");
            } else {


                //hacer if aparte para un user == 2 (usuario comun)
                //hacer if para cada rol diferente
                // echo para ir viendo donde direcciona 
                //

                // Autenticación fallida
                echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='index.php?p=auth/login'>Logearte</a></div>";*/
    }
} else {

    ?>
    <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Inicio sesion</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0 login-bg" >
                            <h3 class="mb-4 text-center">¿tienes una cuenta?</h3>
                            <form action="" method="POST" class="signin-form">
                                <div class="form-group">
                                    <input type="text" name="rut" class="form-control" placeholder="rut" required>
                                </div>
                                <div class="form-group">
                                    <input  name="password" type="password" class="form-control" placeholder="contraseña"
                                        required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control btn btn-primary submit px-3">iniciar
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
                                        <a href="#" >olvidaste la contraseña?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
}
?>