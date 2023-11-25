    <?php
        include("middleware/auth.php");
        include("database/connection.php");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $noticia_id = $_POST['noticia_id'];
            $usuario_id = $_SESSION['id'] ?? null;
            echo "Usuario ID: $usuario_id"; // Debug


            // Verifica que el usuario_id existe en la tabla users
            $queryUsuario = "SELECT * FROM users WHERE id = $id";
            $stmt = mysqli_prepare($connection, $queryUsuario);
            mysqli_stmt_bind_param($stmt, "i", $usuario_id);
            mysqli_stmt_execute($stmt);
            $resultadoUsuario = mysqli_stmt_get_result($stmt);
            
            // Manejo de errores
            if (!$resultadoUsuario) {
                die("Error en la consulta: " . mysqli_error($connection));
            }

            $contenido = $_POST['contenido'];

            // Aquí debes validar y limpiar los datos antes de la inserción en la base de datos

            $query = "INSERT INTO comentario (noticia_id, usuario_id, contenido, fecha_publicacion) VALUES ('$noticia_id', '$usuario_id', '$contenido', NOW())";
            mysqli_query($connection, $query);

            // Redireccionar de nuevo a la página de la noticia después de agregar el comentario
            header("Location: index.php?p=actualidad/noticias/verNoticias?id=$noticia_id");
        }
    ?>