<?php
include("database/connection.php");

// Verificar si se proporcionó una categoría
if (isset($_GET['categoria'])) {
    $categoria_id = $_GET['categoria'];

    // Consulta para obtener noticias filtradas por categoría
    $query = "SELECT idNoticia, titulo, descripcion, imagen, creado, visitas, likes, dislikes, num_valorizaciones, COUNT(valorizacion) AS num_valorizaciones, AVG(valorizacion) AS promedio_valorizacion FROM noticias WHERE id_categoria = $categoria_id GROUP BY idNoticia LIMIT 5";

    // Resultado de la base de datos
    $resultado = mysqli_query($connection, $query);

    // Almacenar noticias en un array
    $noticias = [];
    while ($noticia = mysqli_fetch_assoc($resultado)) {
        $noticias[] = $noticia;
    }

    // Devolver resultados en formato JSON
    echo json_encode($noticias);
} else {
    // Si no se proporciona una categoría, devolver un mensaje de error
    echo json_encode(['error' => 'No se proporcionó una categoría']);
}

mysqli_close($connection);
?>