<?php


include("middleware/auth.php");
include("database/connection.php");

if (isset($_SESSION['email'])) {
    $user_rut = $_SESSION['email'];
} else {
    // El usuario no está autenticado, redirigir o mostrar un mensaje de error.
    header("Location: index.php?p=auth/login");
    exit();
}

// Verificar que el rut del usuario autenticado coincida con el rut en la URL
if (isset($_GET["email"]) && $_GET["email"] == $email) {
    $email = $_GET["email"];
    $query = "SELECT * FROM users WHERE email = '$email';";
    $result = mysqli_query($connection, $query);

    if ($user = mysqli_fetch_assoc($result)) {
        $nombre = $user["nombre"];
        $apellido = $user["apellido"];
        $password = $user["password"];
        $email = $user["email"];
    } else {
        header("Location: index.php?p=auth/index");
        exit();
    }
} else {
    // El usuario no tiene permiso para editar este perfil, redirigir o mostrar un mensaje de error.
    header("Location: index.php?p=auth/login");
    exit();
}




/* include("database/connection.php");
include("middleware/auth.php");

$rut = $_GET["rut"];

$query = "SELECT * FROM users WHERE rut = " . $rut . ";";
$result = mysqli_query($connection, $query);


if ($user = mysqli_fetch_assoc($result)) {
    $nombre = $user["nombre"];
    $apellido = $user["apellido"];
    $password = $user["password"];
    $email = $user["email"];
    $rut = $user["rut"];
} else {
    header("Location: index.php?p=auth/index");
}*/

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marcas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5">
        <div class="row">
            <div class="col">
                <form action="index.php?p=auth/actions/updateprofile" method="POST">
                    <input type="text" class="d-none" name="id" value="<?php echo $id ?>">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Nombre</span>
                        <input type="text" name="nombre" class="form-control" placeholder=""
                            value="<?php echo $nombre ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Apellido</span>
                        <input type="text" name="apellido" class="form-control" placeholder=""
                            value="<?php echo $apellido ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Contraseña</span>
                        <input type="password" name="password" class="form-control" placeholder=""
                            value="<?php echo $password ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Correo</span>
                        <input type="email" name="email" class="form-control" placeholder=""
                            value="<?php echo $email ?>" required>
                    </div>

                    <input type="submit" value="Guardar" class="btn btn-primary">
                </form>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>