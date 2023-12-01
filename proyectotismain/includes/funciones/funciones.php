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

?>