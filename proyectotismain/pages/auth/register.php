<?php


require('database/connection.php');
// Si se envía el formulario, inserte valores en la base de datos.


if (isset($_REQUEST['email'])) {
    $rut = $_REQUEST['rut'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $errorMessages = array();

    // Validación del Rut
    if (!preg_match('/^[0-9]{7,8}$/', $rut) || $rut >= 27000000) {
        $errorMessages[] = "Ingrese un rut valido.";
    }

    // Validación del Nombre
    if (!preg_match('/^[A-Za-z]+$/', $nombre)) {
        $errorMessages[] = "El nombre no es válido. Debe contener solo letras.";
    }
    // Validación del Apellido  
    if (!preg_match('/^[A-Za-z]+$/', $apellido)) {
        $errorMessages[] = "El apellido no es válido. Debe contener solo letras.";
    }

    if (filter_var($email,
    FILTER_VALIDATE_EMAIL) && (strpos($email, '.com') !== false ||
    strpos($email, '.cl') !== false)){
    }else{
         $errorMessages[] = "El email no es válido.";
    }

    // Validación de la Contraseña
    if (strlen($password) < 8) {
        $errorMessages[] = "La contraseña debe contener al menos 8 caracteres.";
    }
    // Validación del Nombre



    if (empty($errorMessages)) {
        // Todas las restricciones se cumplieron, procede con la inserción en la base de datos.
        $rut = mysqli_real_escape_string($connection, $rut);
        $nombre = mysqli_real_escape_string($connection, $nombre);
        $apellido = mysqli_real_escape_string($connection, $apellido);
        $email = mysqli_real_escape_string($connection, $email);
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $trn_date = date("Y-m-d H:i:s");
        $id_rol = 2;

        $query = "INSERT into `users` (rut, nombre, apellido, email, password, id_rol, trn_date) VALUES ('$rut', '$nombre', '$apellido', '$email', '$passwordHash', '$id_rol', '$trn_date')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<div class='form'><h3>Te has registrado correctamente!</h3><br/>Haz click aquí para <a href='index.php?p=auth/login'>Logearte</a></div>";
        } else {
            echo "Error al insertar en la base de datos.";
        }
    } else {
        // Mostrar mensajes de error
        foreach ($errorMessages as $error) {
            echo $error . "<br>";
        }
    }
}
?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Selecciona elementos relevantes
    const passwordField = document.getElementById('password');
    const submitButton = document.getElementById('submit-button');

    // Agrega un controlador de eventos al botón "Registrarse"
    submitButton.addEventListener('click', function(event) {
      const password = passwordField.value;

      // Verifica si la contraseña tiene al menos 8 caracteres
      if (password.length < 8) {
        // Evita el envío del formulario
        event.preventDefault();
        
        // Muestra un mensaje emergente (pop-up) de error
        alert("La contraseña debe contener al menos 8 caracteres.");
      }
    });
  });
</script>
<section class="register-backg register-backg bg-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-5">
                    <div class="card-header">
                        <h1 class="text-center" style="color: black;">Registrate Aquí</h1>
                    </div>
                    <div class="card-body">
                        <form name="registration" action="" method="POST">
                            <div class="form-group mb-3">
                                <label for="rut" class="form-label" style="color: white;">Rut</label>
                                <input type="text" placeholder="Rut sin codigo verificador, ej:20333222" name="rut"
                                    class="form-control" id="rut" required maxlength="8">
                            </div>
                            <div class="form-group mb-3">
                                <label for="nombre" class="form-label" style="color: white;">Nombre</label>
                                <input type="text" placeholder="Nombres sin numeros ni caracteres especiales"
                                    name="nombre" class="form-control" id="nombre" required maxlength="50">
                            </div>
                            <div class="form-group mb-3">
                                <label for="apellido" class="form-label" style="color: white;">Apellido</label>
                                <input type="text" placeholder="Apellidos sin numeros ni caracteres especiales"
                                    name="apellido" class="form-control" id="apellido" required maxlength="50">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label" style="color: white;">Correo</label>
                                <input type="email" placeholder="Correo con el formato 'ejemplo@gmail.com' "
                                    name="email" class="form-control" id="email" required maxlength="60">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label" style="color: white;">Contraseña</label>
                                <input type="password" placeholder="Contraseña de minimo 8 caracteres" name="password"
                                    class="form-control" id="password" required maxlength="20">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>