<?php

// Incluir la conexión a la base de datos
include("database/connection.php");

// Verificar si se proporciona un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    // Consultar la base de datos para obtener la noticia
    $query = "SELECT * FROM noticias WHERE idNoticia = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    // Verificar si se encontró la noticia
    if ($resultado->num_rows) {
        $noticia = mysqli_fetch_assoc($resultado);
    } else {
        // Redirigir si no se encuentra la noticia
        header('Location: ../../../index.php');
        exit();
    }
} else {
    // Redirigir si 'id' no es válido
    header('Location: ../../../index.php');
    exit();
}

?>

<div class="row">
    <div class="col">
    </div>
    <?php require('includes/users/navbar_users.php'); ?>
</div>

<div class="d-inline-flex p-2 flex-column ">
    <h1><?php echo $noticia['titulo'] ?></h1>
    <div class=" p-3">
        <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen']; ?>" class="card-img-top" width="300"
            height="500">
    </div>
    <div class="p-3">
        <p><?php echo $noticia['descripcion'] ?></p>
    </div>
</div>

<div>
    <h2>Comentarios</h2>

    <form name="form1" method="POST" action="">
        <label for="textarea"></label>
        <center>
            <p>
                <textarea name="comentario" col="80" rows="5" id="textarea"></textarea>
            </p>
            <p>
                <input type="submit" <?php if (isset($_GET['id'])) { ?> name="reply" <?php } else { ?> name="comentar"
                    <?php } ?> value="comentar">
            </p>
        </center>
    </form>

    <?php

if (isset($_POST['comentar']) || isset($_POST['reply'])) {
    $email_usuario = isset($_SESSION['email']) ? $_SESSION['email'] : null;
    // Obtener el ID del usuario
    
    $id_usuario = null;
    if ($email_usuario) {
        $query_id = mysqli_query($connection, "SELECT id FROM users WHERE email = '$email_usuario'");
        $id_usuario_row = mysqli_fetch_assoc($query_id);
        $id_usuario = $id_usuario_row['id'];
    }

    if (!$email_usuario || !$id_usuario) {
        echo "Error: El usuario no está autenticado o no se encontró el ID del usuario.";
    } else {
        $comentario = mysqli_real_escape_string($connection, $_POST['comentario']);
        $id_noticia = $idNoticia; // El ID de la noticia al que pertenece el comentario

        // Iniciar la transacción
        mysqli_begin_transaction($connection);

        try {
            // Insertar comentario
            $query_comentario = mysqli_query($connection, "INSERT INTO comentarios (comentario, id_users, id_noticia, fecha) VALUES ('$comentario', '$id_usuario', '$id_noticia', NOW())");

                if (!$query_comentario) {
                    throw new Exception("Error al insertar el comentario: " . mysqli_error($connection));
                }

                // Obtener el ID del comentario recién insertado
                $id_comentario_insertado = mysqli_insert_id($connection);

                if ($id_comentario_insertado <= 0) {
                    throw new Exception("Error al obtener el ID del comentario recién insertado.");
                }

                // Insertar relación en la tabla de enlace
                $query_enlace = mysqli_query($connection, "INSERT INTO comentario_usuario_enlace (id_comentario, id_user) VALUES ('$id_comentario_insertado', '$id_usuario')");

                if (!$query_enlace) {
                    throw new Exception("Error al insertar la relación en la tabla de enlace: " . mysqli_error($connection));
                }

                // Confirmar la transacción
                mysqli_commit($connection);
            } catch (Exception $e) {
                // Revertir la transacción en caso de error
                mysqli_rollback($connection);
                echo $e->getMessage();
            }
        }
    }

    ?>

    <br>
    <div id="container">
        <ul id="comments">
            <?php
            // Obtener y mostrar comentarios
            $comentarios = mysqli_query($connection, "SELECT * FROM comentarios WHERE reply = 0 AND id_noticia = '$id' ORDER BY id DESC");

            while ($row = mysqli_fetch_array($comentarios)) {
                // Obtener información del usuario para el comentario principal
                $usuario = mysqli_query($connection, "SELECT * FROM users WHERE id = '" . $row['id_users'] . "'");
                $user = mysqli_fetch_array($usuario);
            ?>
            <li class="cmmnt">
                <div class="avatar">
                </div>
                <div class="cmmnt-content">
                    <header>
                        <?php 
                                echo $user['nombre'] . ' ' . $user['apellido'] . ' - ' . $row['fecha'];
                            ?>
                    </header>
                    <p>
                        <?php echo $row['comentario']; ?>
                    </p>
                </div>

                <?php
 $respuestas = mysqli_query($connection, "SELECT * FROM comentarios WHERE reply = '" . $row['id'] . "'");
 while ($rep = mysqli_fetch_array($respuestas)) {
     // Obtener información del usuario para la respuesta
     $usuario_respuesta = mysqli_query($connection, "SELECT * FROM users WHERE id = '" . $rep['id_users'] . "'");
     $user_respuesta = mysqli_fetch_array($usuario_respuesta);
 ?>

                <ul class="replies">
                    <li class="cmmnt">
                        <header>
                            <a href="#" class="user-link">
                                <?php echo $user_respuesta['nombre'] . ' ' . $user_respuesta['apellido'] . ' - ' . $rep['fecha']; ?></a>
                        </header>
                        <p>
                            <?php echo $rep['comentario']; ?>
                        </p>
                    </li>
                </ul>

                <?php } ?>

            </li>

            <?php } ?>
        </ul>

    </div>

</div>