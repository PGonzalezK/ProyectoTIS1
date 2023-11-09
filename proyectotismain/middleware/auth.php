<?php
    require("database\connection.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Comprueba si el usuario está logueado
    if(!isset($_SESSION["email"])){
        
        header("Location: index.php?p=auth/login");
    }else{
        
        // Obtener el nombre de usuario de la sesión
        $email = $_SESSION["email"];

        $sql = "SELECT * FROM users WHERE email = '$email'";

        $result = mysqli_query($connection, $sql);

        // Verifica si el usuario existe
        if (mysqli_num_rows($result) == 0) {
            session_destroy();
            // El usuario no existe, redirige a la página de inicio de sesión
            header("Location: index.php?p=auth/login");
        }
    }
?>
