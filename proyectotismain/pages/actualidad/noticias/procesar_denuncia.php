<?php
include("database/connection.php");
include_once 'includes/funciones/funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_id'])) {
    $commentIdToReport = filter_var($_POST['comment_id'], FILTER_VALIDATE_INT);

    $email_usuario_reporta = obtenerEmailUsuarioActual();

    if ($email_usuario_reporta) {
        $id_usuario_reporta = obtenerIdUsuarioPorEmail($connection, $email_usuario_reporta);

        // Verificar si ya se ha denunciado este comentario por el usuario actual
        $query_verificar_denuncia = mysqli_query($connection, "SELECT * FROM denuncias WHERE id_comentario = '$commentIdToReport' AND id_usuario_reporta = '$id_usuario_reporta'");
        $verificacion_denuncia = mysqli_fetch_assoc($query_verificar_denuncia);

        if (!$verificacion_denuncia) {
            // Insertar nueva denuncia en la base de datos
            $query_denuncia = mysqli_query($connection, "INSERT INTO denuncias (id_comentario, id_usuario_reporta, fecha) VALUES ('$commentIdToReport', '$id_usuario_reporta', NOW())");

            if ($query_denuncia) {
                echo 'Comentario denunciado correctamente.';
            } else {
                echo 'Error al denunciar el comentario: ' . mysqli_error($connection);
            }
        } else {
            echo 'Ya has denunciado este comentario anteriormente.';
        }
    } else {
        echo 'Tienes que iniciar sesión para denunciar este comentario.';
    }
} else {
    echo 'Parámetros inválidos.';
}
?>
