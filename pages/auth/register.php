<?php


/*require('database/connection.php');

if (isset($_POST['submit'])) {
    $rut = mysqli_real_escape_string($connection, $_POST['rut']);
    $nombre = mysqli_real_escape_string($connection, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($connection, $_POST['apellido']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $trn_date = date("Y-m-d H:i:s");
    $id_rol = 2;

    $query = "INSERT INTO `users` (rut, nombre, apellido, email, password, id_rol, trn_date) VALUES ('$rut', '$nombre', '$apellido', '$email', '$password', '$id_rol', '$trn_date')";
    
    if (mysqli_query($connection, $query)) {
        // Registro exitoso
        $email_to_send = $email; // Dirección de correo electrónico del usuario
        // Generar un enlace de confirmación y mensaje

        // Configurar el correo de confirmación
        $subject = "Confirmación de registro";
        $message = "Gracias por registrarte en nuestro sitio. Por favor, haz clic en el enlace de confirmación: [ENLACE]";
        $headers = "From: pruebaemailtis1@gmail.com";

        // Insertar un registro en la tabla de correos electrónicos
        $query = "INSERT INTO `emails` (to_email, subject, message, headers, status) VALUES ('$email_to_send', '$subject', '$message', '$headers', 'pendiente')";

        if (mysqli_query($connection, $query)) {
            // Envío de correo de confirmación
            if (mail($email_to_send, $subject, $message, $headers)) {
                echo "Te has registrado correctamente. Se ha enviado un correo de confirmación a tu dirección de correo.";
                header("Location: index.php?p=auth/confirmacion/register_process"); // Redirige al usuario a la página de confirmación
                exit();
            } else {
                echo "Error al enviar el correo de confirmación.";
            }
        } else {
            echo "Error al insertar el correo en la base de datos.";
        }
    } else {
        echo "Error al registrar el usuario.";
    }

}
*/




    require('database/connection.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        $rut = stripslashes($_REQUEST['rut']); // removes backslashes
        $rut = mysqli_real_escape_string($connection, $rut); //escapes special characters in a string
        $nombre = stripslashes($_REQUEST['nombre']);
        $nombre = mysqli_real_escape_string($connection, $nombre);
        $apellido = stripslashes($_REQUEST['apellido']);
        $apellido = mysqli_real_escape_string($connection, $apellido);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($connection, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);
        $trn_date = date("Y-m-d H:i:s");
        
        $id_rol = 2;

        $query = "INSERT into `users` (rut, nombre, apellido, email, password, id_rol, trn_date) VALUES ('$rut', '$nombre', '$apellido', '$email', '$password', '$id_rol', '$trn_date')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<div class='form'><h3>Te has registrado correctamente!</h3><br/>Haz click aquí para <a href='index.php?p=auth/login'>Logearte</a></div>";
        }
    } else {
        
    ?>
    <section class="register-backg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card-5">
                        <div class="card-header">
                            <h1 class="text-center">Registrate Aquí</h1>
                        </div>
                        <div class="card-body">
                            <form  name="registration" action="" method="POST">
                                <div class="form-group mb-3">
                                    <label for="rut" class="form-label">Rut</label>
                                    <input type="text" name="rut" class="form-control" id="rut" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" id="apellido" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit"  name="submit" class="btn btn-primary">Registrarse</button>
                                </div>
                            </form>
                        
                        </div>
                    
                    </div>
                
                </div>
            
            </div>
        </div>
        </section>
        
    <?php }
    
?>