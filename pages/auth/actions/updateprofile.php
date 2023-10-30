<?php

include("database/connection.php");
include("middleware/auth.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre_recibido = $_POST["nombre"];
    $apellido_recibido = $_POST["apellido"];
    $password_recibido = $_POST["password"];
    $email_recibido = $_POST["email"];

    // Verificar que el usuario esté autenticado y que los datos sean válidos
    if (isset($_SESSION['rut']) && !empty($nombre_recibido) && !empty($apellido_recibido) && !empty($password_recibido) && !empty($email_recibido)) {
        $rut = $_SESSION['rut'];
        // Actualizar el perfil del usuario autenticado
        $update_query = "UPDATE users SET nombre = '$nombre_recibido', apellido = '$apellido_recibido', password = '$password_recibido', email = '$email_recibido' WHERE rut = '$rut';";
        $result = mysqli_query($connection, $update_query);

        if ($result) {
            header("Location: index.php?p=auth/profile");
            exit();
        } else {
            echo "Error al actualizar el perfil.";
        }
    }
}



/* include("database/connection.php");
include("middleware/auth.php");


$nombre_recibido = $_POST["nombre"];
$apellido_recibido = $_POST["apellido"];
$password_recibido  = $_POST["password"];
$email_recibido = $_POST["email"];


$insert = "UPDATE users SET nombre = '$nombre_recibido', apellido = '$apellido_recibido', password = '$password_recibido', email = '$email_recibido'";
$respuesta = mysqli_query($connection, $insert);
header("Location: index.php"); */
?>