<?php 
     $id = $_GET['id'];
     $id = filter_var($id, FILTER_VALIDATE_INT);
    //importar la bd
    include("database/connection.php");
    //consultar db
    $query = "SELECT * FROM noticias WHERE idNoticia = ${id}";
    //resultado db
    $resultado = mysqli_query($connection, $query);

    if(!$resultado-> num_rows){
        header('Location: ../../../index.php');
    }

    $noticia = mysqli_fetch_assoc($resultado);
	$queryComentarios = "SELECT * FROM comentario WHERE noticia_id = ${id}";
    $resultadoComentarios = mysqli_query($connection, $queryComentarios);

    // Consultar likes y dislikes de la base de datos
    $queryLikes = "SELECT COUNT(*) as total_likes FROM likes WHERE comentario_id IN (SELECT comentario_id FROM comentario WHERE noticia_id = ${id})";
    $queryDislikes = "SELECT COUNT(*) as total_dislikes FROM dislike WHERE comentario_id IN (SELECT comentario_id FROM comentario WHERE noticia_id = ${id})";
    
    $resultadoLikes = mysqli_query($connection, $queryLikes);
    $resultadoDislikes = mysqli_query($connection, $queryDislikes);

    // Obtener el número total de likes y dislikes
    $likes = mysqli_fetch_assoc($resultadoLikes)['total_likes'];
    $dislikes = mysqli_fetch_assoc($resultadoDislikes)['total_dislikes'];

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

	<!-- Código HTML existente -->

<!-- Mostrar número de likes y dislikes -->
<div>
    <p>Likes: <?php echo $likes; ?></p>
    <p>Dislikes: <?php echo $dislikes; ?></p>
</div>

<!-- Formulario para agregar comentarios -->
<form action="index.php?p=actualidad/noticias/action/procesar_comentario" method="POST">
    <input type="hidden" name="noticia_id" value="<?php echo $id; ?>">
    <textarea name="contenido" placeholder="Escribe tu comentario"></textarea>
    <button type="submit">Comentar</button>
</form>

<!-- Mostrar comentarios existentes -->
<div>
    <?php while ($comentario = mysqli_fetch_assoc($resultadoComentarios)): ?>
        <p><?php echo $comentario['usuario_nombre']; ?>: <?php echo $comentario['contenido']; ?></p>
    <?php endwhile; ?>
</div>

<?php
    mysqli_close($connection);
?>

