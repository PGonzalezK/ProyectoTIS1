<?php
require('database/connection.php');

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
        header("Location: index.php?p=home");
    } else {
        // Autenticación fallida
        echo "<div class='form'><h3>Usuario/Contraseña Incorrecto</h3><br/>Haz click aquí para <a href='index.php?p=auth/login'>Logearte</a></div>";
    }
} else {
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Iniciar Sesión</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" name="login">
                            <div class="form-group mb-3">
                                <label for="rut">Rut</label>
                                <input type="text" name="rut" class="form-control" placeholder="Ingresa tu usuario"
                                    required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Ingresa tu contraseña" required />
                            </div>
                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-primary btn-block">Entrar</button>
                            </div>
                        </form>
                        <p class="text-center">¿No estás registrado aún? <a href='index.php?p=auth/register'>Regístrate
                                aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>