<?php

function obtenerEmailUsuarioActual()
{
    if (isset($_SESSION['email'])) {
        return $_SESSION['email'];
    }

    return null;
}

function obtenerNoticiaPorId($connection, $id)
{
    $query = "SELECT noticias.*, categoria.nombre AS categoria_nombre FROM noticias JOIN categoria ON noticias.id_categoria = categoria.id_categoria WHERE idNoticia = ?";
    
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado->num_rows) {
        return mysqli_fetch_assoc($resultado);
    }

    return null;
}

function obtenerEventoPorId($connection, $id)
{
    $query = "SELECT * FROM eventos WHERE idEvento = ?";
    
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado->num_rows) {
        return mysqli_fetch_assoc($resultado);
    }

    return null;
}
function verificarUsuarioSigueEvento($connection, $email_usuario, $id_evento) {
    if ($email_usuario !== null) {
        $query = "SELECT * FROM seguimientos_eventos WHERE email = '$email_usuario' AND id_evento = '$id_evento'";
        $result = mysqli_query($connection, $query);

        return ($result && mysqli_num_rows($result) > 0);
    } else {
        return false;
    }
}

// Función para permitir que un usuario siga un evento
function seguirEvento($connection, $email_usuario, $id_evento) {
    if ($email_usuario !== null) {
        $query = "INSERT INTO seguimientos_eventos (email, id_evento) VALUES ('$email_usuario', '$id_evento')";
        $result = mysqli_query($connection, $query);

        return $result;
    } else {
        return false;
    }
}

function incrementarVisitas($connection, $id)
{
    mysqli_query($connection, "UPDATE noticias SET visitas = visitas + 1 WHERE idNoticia = $id");
}

function obtenerAccionUsuario($connection, $email_usuario, $id_noticia)
{
    $query = "SELECT accion FROM acciones_usuarios WHERE email_usuario = ? AND id_noticia = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'si', $email_usuario, $id_noticia);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado->num_rows) {
        return mysqli_fetch_assoc($resultado)['accion'];
    }

    return null;
}

function registrarAccionUsuario($connection, $email_usuario, $id_noticia, $accion)
{
    $query = "INSERT INTO acciones_usuarios (email_usuario, id_noticia, accion) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sis', $email_usuario, $id_noticia, $accion);
    mysqli_stmt_execute($stmt);
}


function obtenerNoticiasPorCategoria($idCategoria, $limite = 99)
{
    global $connection;

    $idCategoria = mysqli_real_escape_string($connection, $idCategoria);

    // Inicializar la condición WHERE
    $condicionCategoria = '';

    // Verificar si se proporciona una categoría
    if (!empty($idCategoria)) {
        $condicionCategoria = "WHERE categoria.id_categoria = $idCategoria";
    }

    // Construir la consulta
    $query = "SELECT * FROM noticias
              LEFT JOIN categoria ON noticias.id_categoria = categoria.id_categoria
              $condicionCategoria
              LIMIT $limite";

    $resultado = mysqli_query($connection, $query);

    $noticias = [];
    while ($noticia = mysqli_fetch_assoc($resultado)) {
        $noticias[] = $noticia;
    }

    return $noticias;
}

function obtenerCategorias()
{
    global $connection;

    $query = "SELECT id_categoria, nombre FROM categoria";
    $resultado = mysqli_query($connection, $query);

    $categorias = [];
    while ($categoria = mysqli_fetch_assoc($resultado)) {
        $categorias[] = $categoria;
    }

    return $categorias;
}



function obtenerIdUsuarioPorEmail($connection, $email)
{
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

function incrementarLikesNoticia($connection, $id_noticia)
{
    // Incrementar los likes de la noticia en la base de datos
    $query_incrementar_likes = "UPDATE noticias SET likes = likes + 1 WHERE idNoticia = ?";
    $stmt_incrementar_likes = mysqli_prepare($connection, $query_incrementar_likes);
    mysqli_stmt_bind_param($stmt_incrementar_likes, 'i', $id_noticia);

    if (mysqli_stmt_execute($stmt_incrementar_likes)) {
        echo "Likes incrementados correctamente.";
    } else {
        echo "Error al incrementar los likes de la noticia: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt_incrementar_likes);
}


?>

