<?php 
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

include("database/connection.php");

$query = "SELECT * FROM noticias WHERE idNoticia = ${id}";
$resultado = mysqli_query($connection, $query);

if (!$resultado->num_rows) {
    header('Location: ../../../index.php');
}

$noticia = mysqli_fetch_assoc($resultado);

// Obtener likes y dislikes
$queryLikes = "SELECT COUNT(*) AS likes FROM megusta_nomegusta WHERE comentario_id = ${id} AND like_unlike = 'like'";
$queryDislikes = "SELECT COUNT(*) AS dislikes FROM megusta_nomegusta WHERE comentario_id = ${id} AND like_unlike = 'unlike'";

$resultLikes = mysqli_query($connection, $queryLikes);
$resultDislikes = mysqli_query($connection, $queryDislikes);

$likes = mysqli_fetch_assoc($resultLikes)['likes'];
$dislikes = mysqli_fetch_assoc($resultDislikes)['dislikes'];

// Obtener comentarios y su información de me gusta/no me gusta
$queryComentarios = "
    SELECT 
        c.*, 
        m.like_unlike AS me_gusta_no_me_gusta
    FROM comentario c
    LEFT JOIN megusta_nomegusta m ON c.comentario_id = m.comentario_id
    WHERE c.parent_comentario_id IS NULL AND c.comentario_id = ${id}
    ORDER BY c.date DESC
";

$resultComentarios = mysqli_query($connection, $queryComentarios);

//mysqli_close($connection);
?>

    <div class="row">
        <div class="col">

        </div>
        <?php require('includes/users/navbar_users.php'); ?>

    </div>
    <div class="d-inline-flex p-2 flex-column ">
        <h1><?php echo  $noticia['titulo']?></h1>
            <div class=" p-3">
                <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen'];?>" class="card-img-top" width="300" height="500">
            </div>
            <div class="p-3">
                <p> <?php echo $noticia['descripcion']?></p>   
            </div>
    </div>

<?php
    mysqli_close($connection);
?>


<!-- Sección de comentarios -->
<div>
    <h2>Comentarios</h2>
    <div id="comentarios">
        <?php while ($comentario = mysqli_fetch_assoc($resultComentarios)): ?>
            <p>
                <?php echo $comentario['comment_sender_name'] . ': ' . $comentario['comment']; ?>
                <button onclick="meGustaNoMeGusta(<?php echo $comentario['comentario_id']; ?>, 'like')">Me gusta <?php echo $comentario['likes']; ?></button>
                <button onclick="meGustaNoMeGusta(<?php echo $comentario['comentario_id']; ?>, 'unlike')">No me gusta <?php echo $comentario['dislikes']; ?></button>
            </p>
        <?php endwhile; ?>
    </div>
    <form action="index.php?p=actualidad/noticias/procesar_comentario" method="post">
        <label for="comentario">Agregar comentario:</label>
        <input type="text" name="comentario" required>
        <input type="hidden" name="idNoticia" value="<?php echo $id; ?>">
        <button type="submit">Comentar</button>
    </form>
</div>

<script>
    function meGustaNoMeGusta(comentarioId, tipo) {
        // Lógica para manejar el me gusta/no me gusta
        // Puedes usar AJAX para realizar la actualización sin recargar la página
        alert(`Me gusta/no me gusta para el comentario ${comentarioId}, tipo: ${tipo}`);
    }
</script>