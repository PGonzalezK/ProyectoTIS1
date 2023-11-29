<?php

include("database/connection.php");

// Verificar si el usuario está autenticado
if (!isset($_SESSION['email'])) {
    echo "Debes iniciar sesión para valorizar la noticia.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_noticia = $_POST["id_noticia"];
    $valorizacion = $_POST["valorizacion"];
    $email_usuario = $_SESSION['email'];

    // Obtener el ID del usuario
    $id_usuario = obtenerIdUsuarioPorEmail($connection, $email_usuario);

    if (!$id_usuario) {
        echo "Error: No se pudo obtener el ID del usuario.";
        exit();
    }

    // Verificar si el usuario ya valorizó esta noticia
    $query_valorizacion_existente = "SELECT * FROM valorizaciones WHERE id_usuario = ? AND id_noticia = ?";
    $stmt_valorizacion_existente = mysqli_prepare($connection, $query_valorizacion_existente);
    mysqli_stmt_bind_param($stmt_valorizacion_existente, 'ii', $id_usuario, $id_noticia);
    mysqli_stmt_execute($stmt_valorizacion_existente);
    $resultado_valorizacion_existente = mysqli_stmt_get_result($stmt_valorizacion_existente);

    if ($resultado_valorizacion_existente->num_rows > 0) {
        echo "Ya has valorizado esta noticia.";
        exit();
    }

    // Actualizar la base de datos con la valorización
    $query_update = "UPDATE noticias SET valorizacion = valorizacion + ?, num_valorizaciones = num_valorizaciones + 1 WHERE idNoticia = ?";
    $stmt_update = mysqli_prepare($connection, $query_update);
    mysqli_stmt_bind_param($stmt_update, 'ii', $valorizacion, $id_noticia);

    if (mysqli_stmt_execute($stmt_update)) {
        // Registrar la valorización en la tabla de valorizaciones para evitar valorizaciones múltiples
        $query_insert_valorizacion = "INSERT INTO valorizaciones (id_usuario, id_noticia) VALUES (?, ?)";
        $stmt_insert_valorizacion = mysqli_prepare($connection, $query_insert_valorizacion);
        mysqli_stmt_bind_param($stmt_insert_valorizacion, 'ii', $id_usuario, $id_noticia);
        mysqli_stmt_execute($stmt_insert_valorizacion);

        echo "Noticia valorizada correctamente.";
    } else {
        echo "Error al valorizar la noticia: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt_update);
    mysqli_stmt_close($stmt_insert_valorizacion);
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


mysqli_close($connection);
?>

