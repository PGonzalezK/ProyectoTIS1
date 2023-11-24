<?php
include("middleware/auth.php"); // Asegúrate de que esto incluye session_start()

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprueba si hay una sesión activa
    if (isset($_SESSION["usuario"])) {
        $comentario = $_POST["comentario"];
        $idNoticia = $_POST["idNoticia"];
        $usuario = $_SESSION["usuario"];

        // Asegúrate de que la tabla 'comentarios' exista en tu base de datos
        include("database/connection.php");
        $query = "INSERT INTO comentario (idNoticia, usuario, contenido) VALUES (${idNoticia}, '${usuario}', '${comentario}')";

        try {
            mysqli_query($connection, $query);
            mysqli_close($connection);
            // Redirige de vuelta a la página de la noticia
            header("Location: verNoticia.php?id=${idNoticia}");
            exit(); // Termina el script después de la redirección
        } catch (Exception $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
        }
    } else {
        // No hay una sesión activa, manejar según tus necesidades
        echo "No hay una sesión activa";
    }
} else {
    // Si no es una solicitud POST, redirige a la página principal
    header("Location: ../../../index.php");
    exit(); // Termina el script después de la redirección
}
?>
