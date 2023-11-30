<?php
include("database/connection.php");
include("funciones.php");

$email_usuario = obtenerEmailUsuarioActual();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    $noticia = obtenerNoticiaPorId($connection, $id);

    if ($noticia) {
        incrementarVisitas($connection, $id);

        $accion = null;

        if ($email_usuario) {
            $accion = obtenerAccionUsuario($connection, $email_usuario, $id);
        }
    } else {
        header('Location: ../../../index.php');
        exit();
    }
} else {
    header('Location: ../../../index.php');
    exit();
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
                        <?php if (!$email_usuario) { ?>
                        <!-- Si el usuario no ha iniciado sesión, mostrar un mensaje y los botones de registro e inicio de sesión -->
                        <div class="news-list">
                            <p>Inicia sesión o crea una cuenta en Nexo Municipal para comentar. Como una forma de
                                mantener un debate respetuoso, eliminaremos mensajes agresivos u ofensivos.</p>
                            <div class="brand">
                                <div class="b-ads ">
                                    <div class="d-flex p-5">
                                        <a href="index.php?p=auth/login" class="btn">Iniciar Sesión</a>
                                        <a href="index.php?p=auth/register" class="btn">Registrarse</a>
                                    </div>
                                </div>
                            </div>
                            <?php } else { ?>
                            <div class="news-list">
                                <div>
                                    <!--caja comentarios-->
                                    <div class="sn-button">
                                        <form name="form1" method="POST" action="">
                                            <label for="textarea"></label>
                                            <p>
                                                <textarea name="comentario" col="80" rows="5" id="textarea"></textarea>
                                            </p>
                                            <p>
                                            <div class="d-ads">
                                                <input type="submit" <?php if (isset($_GET['id'])) { ?> name="reply"
                                                    <?php } else { ?> name="comentar" <?php } ?> class="btn"
                                                    value="Comentar">
                                            </div>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                    $id_noticia = $id;
                                    if (isset($_POST['comentar']) || isset($_POST['reply'])) {
                                        $email_usuario = isset($_SESSION['email']) ? $_SESSION['email'] : null;
                                        $id_usuario = null;

                                        if ($email_usuario) {
                                            $query_id = mysqli_query($connection, "SELECT id FROM users WHERE email = '$email_usuario'");
                                            $id_usuario_row = mysqli_fetch_assoc($query_id);
                                            $id_usuario = $id_usuario_row['id'];
                                        }

                                        if (!$email_usuario || !$id_usuario || !$id_noticia) {
                                            echo "Error: El usuario no está autenticado, no se encontró el ID del usuario o el ID de la noticia.";
                                        } else {
                                            $comentario = mysqli_real_escape_string($connection, $_POST['comentario']);
                                            mysqli_begin_transaction($connection);

                                            try {
                                                
                                                $query_comentario = mysqli_query($connection, "INSERT INTO comentarios (comentario, id_users, id_noticia, fecha) VALUES ('$comentario', '$id_usuario', '$id_noticia', NOW())");

                                                if (!$query_comentario) {
                                                    throw new Exception("Error al insertar el comentario: " . mysqli_error($connection));
                                                }

                                                $id_comentario_insertado = mysqli_insert_id($connection);

                                                if ($id_comentario_insertado <= 0) {
                                                    throw new Exception("Error al obtener el ID del comentario recién insertado.");
                                                }

                                                $query_enlace = mysqli_query($connection, "INSERT INTO comentario_usuario_enlace (id_comentario, id_user) VALUES ('$id_comentario_insertado', '$id_usuario')");

                                                if (!$query_enlace) {
                                                    throw new Exception("Error al insertar la relación en la tabla de enlace: " . mysqli_error($connection));
                                                }

                                                mysqli_commit($connection);
                                            } catch (Exception $e) {
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
            $comentarios = mysqli_query($connection, "SELECT * FROM comentarios WHERE reply = 0 AND id_noticia = '$id' ORDER BY id DESC");

            while ($row = mysqli_fetch_array($comentarios)) {
                $usuario = mysqli_query($connection, "SELECT * FROM users WHERE id = '" . $row['id_users'] . "'");
                $user = mysqli_fetch_array($usuario);
            ?>
                                        <li class="cmmnt">
                                            <div class="avatar"></div>
                                            <div class="cmmnt-content">
                                                <header>
                                                    <?php echo $user['nombre'] . ' ' . $user['apellido'] . ' - ' . $row['fecha']; ?>
                                                </header>
                                                <p>
                                                    <?php echo $row['comentario']; ?>
                                                </p>
                                                <div class="comment-actions">
                                                    <form method="POST" action="">
                                                        <a href="#"
                                                            onclick="mostrarDenunciarModal(<?php echo $row['id']; ?>); return false;">Denunciar</a>
                                                    </form>
                                                </div>
                                            </div>

                                            <?php
                    $respuestas = mysqli_query($connection, "SELECT * FROM comentarios WHERE reply = '" . $row['id'] . "'");
                    while ($rep = mysqli_fetch_array($respuestas)) {
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
                                                    <div class="comment-actions">
                                                        <form method="POST" action="">
                                                            <a href="#"
                                                                onclick="mostrarDenunciarModal(<?php echo $rep['id']; ?>); return false;">Denunciar</a>
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>

                                            <?php } ?>

                                        </li>

                                        <?php } ?>

                                        <?php
                                            if (isset($_POST['comment_id'])) {
                                                $email_usuario_reporta = obtenerEmailUsuarioActual();
                                            
                                                if (!$email_usuario_reporta) {
                                                    echo "<script>alert('Tienes que iniciar sesión para denunciar este comentario.');</script>";
                                                } else {
                                                    $comment_id_to_report = mysqli_real_escape_string($connection, $_POST['comment_id']);
                                                    $id_usuario_reporta = obtenerIdUsuarioPorEmail($connection, $email_usuario_reporta);
                                            
                                                    // Verificar si ya se ha denunciado este comentario por el usuario actual
                                                    $query_verificar_denuncia = mysqli_query($connection, "SELECT * FROM denuncias WHERE id_comentario = '$comment_id_to_report' AND id_usuario_reporta = '$id_usuario_reporta'");
                                                    $verificacion_denuncia = mysqli_fetch_assoc($query_verificar_denuncia);
                                            
                                                    if (!$verificacion_denuncia) {
                                                        // Insertar nueva denuncia en la base de datos
                                                        $query_denuncia = mysqli_query($connection, "INSERT INTO denuncias (id_comentario, id_usuario_reporta, fecha) VALUES ('$comment_id_to_report', '$id_usuario_reporta', NOW())");
                                            
                                                        if ($query_denuncia) {
                                                            echo "<script>alert('Comentario con ID $comment_id_to_report denunciado correctamente.');</script>";
                                                        } else {
                                                            echo "<script>alert('Error al denunciar el comentario: " . mysqli_error($connection) . "');</script>";
                                                        }
                                                    } else {
                                                        echo "<script>alert('Ya has denunciado este comentario anteriormente.');</script>";
                                                    }
                                                }
                                            }
                                            ?>
                                    </ul>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                        <div class="sidebar-widget">
                            <h2 class="sw-title">Categoría</h2>
                            <div class="category">
                                <ul>
                                    <li><?php echo $noticia['categoria_nombre']; ?></li>
                                </ul>
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

    <!-- Modal para denunciar comentario -->
    <div class="modal fade" id="denunciarModal" tabindex="-1" aria-labelledby="denunciarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="denunciarModalLabel">Denunciar Comentario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que quieres denunciar este comentario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" data-comment-id="<?php echo $comment_id; ?>"
                        onclick="reportComment(this.getAttribute('data-comment-id'))">Denunciar</button>
                </div>
            </div>
        </div>
    </div>


    <script>
    // Función para mostrar el modal de denunciar
    function mostrarDenunciarModal(commentId) {
        $('#denunciarModal').modal('show');
        // También puedes realizar acciones adicionales aquí, si es necesario
        // Por ejemplo, almacenar el ID del comentario que se va a denunciar
        document.getElementById('commentIdToReport').value = commentId;
    }

    // Función para enviar la denuncia
    function reportComment(commentId) {
        // Puedes realizar aquí acciones adicionales antes de enviar la denuncia, si es necesario
        // Por ejemplo, enviar la denuncia mediante una solicitud AJAX
        document.getElementById('commentId').value = commentId;
        document.forms[0].submit(); // Asegúrate de que este sea el formulario correcto
    }
    </script>

    <!-- Añadir un campo oculto para almacenar el ID del comentario que se va a denunciar -->
    <input type="hidden" id="commentIdToReport" name="comment_id">