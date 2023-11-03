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
                                    <input type="text" name="rut" class="form-control" placeholder="rut" required>
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
}
?>