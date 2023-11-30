<?php

// Incluir la conexión a la base de datos
include("database/connection.php");
$accion = null;
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

        // Incrementar el contador de visitas
        $id_noticia = $noticia['idNoticia'];
        mysqli_query($connection, "UPDATE noticias SET visitas = visitas + 1 WHERE idNoticia = $id_noticia");

        // Verificar si el usuario ya ha dado like o dislike
        $email_usuario  = obtenerEmailUsuarioActual();  // Ajusta esta función según tu implementación de autenticación
        
        if (!$email_usuario) {
            // Mostrar un mensaje si el usuario no está autenticado
            echo "Debes iniciar sesión para dar like o dislike a la publicación.";
        } else {
        if (isset($_POST['like'])) {
            $accion = obtenerAccionUsuario($connection, $email_usuario, $id_noticia);
            if ($accion === 'like') {
                // El usuario ya dio like, ahora cambiamos a dislike
                mysqli_query($connection, "UPDATE noticias SET likes = likes - 1 WHERE idNoticia = $id_noticia");
        
                $query_update = "INSERT INTO acciones_usuarios (email_usuario, id_noticia, accion) VALUES (?, ?, 'dislike') ON DUPLICATE KEY UPDATE accion = 'dislike'";
                $stmt_update = mysqli_prepare($connection, $query_update);
                mysqli_stmt_bind_param($stmt_update, 'si', $email_usuario, $id_noticia);
                mysqli_stmt_execute($stmt_update);
            } else {
                // El usuario aún no dio like o dio dislike, actualizamos a like
                mysqli_query($connection, "UPDATE noticias SET likes = likes + 1 WHERE idNoticia = $id_noticia");
        
                if ($accion === 'dislike') {
                    // Si previamente dio dislike, restamos 1 de dislikes
                    mysqli_query($connection, "UPDATE noticias SET dislikes = dislikes - 1 WHERE idNoticia = $id_noticia");
                }
        
                // Asegúrate de cambiar 'id_usuario' por 'email_usuario' si estás usando el correo electrónico
                $query_insert = "INSERT INTO acciones_usuarios (email_usuario, id_noticia, accion) VALUES (?, ?, 'like') ON DUPLICATE KEY UPDATE accion = 'like'";
                $stmt_insert = mysqli_prepare($connection, $query_insert);
                mysqli_stmt_bind_param($stmt_insert, 'si', $email_usuario, $id_noticia);
                mysqli_stmt_execute($stmt_insert);
            }
        }
        
        if (isset($_POST['dislike'])) {
            if ($accion === 'dislike') {
                // El usuario ya dio dislike, ahora cambiamos a like
                mysqli_query($connection, "UPDATE noticias SET dislikes = dislikes - 1 WHERE idNoticia = $id_noticia");
        
                $query_update = "INSERT INTO acciones_usuarios (email_usuario, id_noticia, accion) VALUES (?, ?, 'like') ON DUPLICATE KEY UPDATE accion = 'like'";
                $stmt_update = mysqli_prepare($connection, $query_update);
                mysqli_stmt_bind_param($stmt_update, 'si', $email_usuario, $id_noticia);
                mysqli_stmt_execute($stmt_update);
            } else {
                // El usuario aún no dio dislike o dio like, actualizamos a dislike
                mysqli_query($connection, "UPDATE noticias SET dislikes = dislikes + 1 WHERE idNoticia = $id_noticia");
        
                if ($accion === 'like') {
                    // Si previamente dio like, restamos 1 de likes
                    mysqli_query($connection, "UPDATE noticias SET likes = likes - 1 WHERE idNoticia = $id_noticia");
                }
        
                // Asegúrate de cambiar 'id_usuario' por 'email_usuario' si estás usando el correo electrónico
                $query_insert = "INSERT INTO acciones_usuarios (email_usuario, id_noticia, accion) VALUES (?, ?, 'dislike') ON DUPLICATE KEY UPDATE accion = 'dislike'";
                $stmt_insert = mysqli_prepare($connection, $query_insert);
                mysqli_stmt_bind_param($stmt_insert, 'si', $email_usuario, $id_noticia);
                mysqli_stmt_execute($stmt_insert);
            }
        }
    }
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

// Funciones adicionales

function obtenerEmailUsuarioActual() {
    // Verifica si el correo electrónico está presente en la sesión
    if (isset($_SESSION['email'])) {
        // Devuelve el correo electrónico desde la sesión
        return $_SESSION['email'];
    }

    // Devuelve algún valor que indique que no hay un usuario autenticado
    return null;
}

function obtenerIdUsuarioPorEmail($connection, $email) {
    $query = "SELECT id FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado->num_rows) {
        $id_usuario = mysqli_fetch_assoc($resultado)['id'];
        return $id_usuario;
    }

    return null;
}

function obtenerAccionUsuario($connection, $email_usuario, $id_noticia) {
    $query = "SELECT accion FROM acciones_usuarios WHERE email_usuario = ? AND id_noticia = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'si', $email_usuario, $id_noticia);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado->num_rows) {
        $accion = mysqli_fetch_assoc($resultado)['accion'];
        return $accion;
    }

    return null;
}

function registrarAccionUsuario($connection, $email_usuario, $id_noticia, $accion) {
    $query = "INSERT INTO acciones_usuarios (email_usuario, id_noticia, accion) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sis', $email_usuario, $id_noticia, $accion);
    mysqli_stmt_execute($stmt);
}
?>

<div class="row">
    <div class="col">
    </div>
    <?php require('includes/users/navbar_users.php'); ?>
</div>


<!--AQUI SE VEN LAS NOTICIAS. -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?p=home">Inicio</a></li>
            <li class="breadcrumb-item"><a href="#">Noticias</a></li>
            <li class="breadcrumb-item active">Detalles de la Noticia</li>
        </ul>
</div>
</div>
<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="sn-container">
                    <div class="sn-img">
                        <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen']; ?>" />
                    </div>
                    <div class="sn-content">
                        <h1 class="sn-title"><?php echo $noticia['titulo'] ?></h1>
                        <p><?php echo $noticia['descripcion'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2 class="sw-title">Comentarios</h2>
                                <div class="news-list">
                                <div>
                                        <form name="form1" method="POST" action="">
                                            <label for="textarea"></label>
                                                <p>
                                                    <textarea name="comentario" col="80" rows="5" id="textarea"></textarea>
                                                </p>
                                                <p>
                                                    <input type="submit" <?php if (isset($_GET['id'])) { ?> name="reply" <?php } else { ?> name="comentar"
                                                        <?php } ?> value="comentar">
                                                </p>
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

                                            </div>
                                            <!-- Agregar el botón de Denunciar -->
                                            <div>
                                                <form method="POST" action="">
                                                    <input type="hidden" name="comment_id" value="<?php echo $row['id']; ?>">
                                                    <button type="submit" name="report_comment">Denunciar</button>
                                                </form>


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
                                                <?php

                                                        if (isset($_POST['report_comment'])) {
                                                            // Verificar si el usuario está autenticado
                                                            $email_usuario_reporta = obtenerEmailUsuarioActual();

                                                            if (!$email_usuario_reporta) {
                                                                // Mostrar un mensaje si el usuario no está autenticado
                                                                echo "Tienes que iniciar sesión para denunciar este comentario.";
                                                            } else {
                                                                // El usuario está autenticado, proceder con la denuncia
                                                                $comment_id_to_report = mysqli_real_escape_string($connection, $_POST['comment_id']);
                                                                $id_usuario_reporta = obtenerIdUsuarioPorEmail($connection, $email_usuario_reporta);

                                                                // Insertar la denuncia en la tabla de denuncias
                                                                $query_denuncia = mysqli_query($connection, "INSERT INTO denuncias (id_comentario, id_usuario_reporta) VALUES ('$comment_id_to_report', '$id_usuario_reporta')");

                                                                if ($query_denuncia) {
                                                                    echo "Comentario con ID $comment_id_to_report denunciado correctamente.";
                                                                } else {
                                                                    echo "Error al denunciar el comentario: " . mysqli_error($connection);
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </ul>

                                            </div>

                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
        </div>

    </div>
</div>
<form method="post">
    <input type="submit" name="like" value="Like">
    <input type="submit" name="dislike" value="Dislike">
</form>

<!-- Modal para el mensaje de inicio de sesión -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Debes iniciar sesión para dar like o dislike a la publicación.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
