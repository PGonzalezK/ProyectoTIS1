<?php
//conectar a la base de datos
include("database/connection.php");

$filtroCategoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;
$query = "SELECT noticias.*, categoria.nombre AS categoria_nombre 
          FROM noticias 
          JOIN categoria ON noticias.id_categoria = categoria.id_categoria";
          
$redireccionURL = "index.php?p=actualidad/noticias/noticias";
// Agregar filtro por categoría si está seleccionada
if (!empty($filtroCategoria)) {
    $categoriaEncoded = urlencode($filtroCategoria);
    $redireccionURL .= "&categoria=$categoriaEncoded";
}

$query .= " ORDER BY noticias.creado DESC LIMIT $limite";

$resultado = mysqli_query($connection, $query);

?>

<div class="row tn-slider">
    <?php
    while ($noticia = mysqli_fetch_assoc($resultado)) :
    ?>
        <div class="col-md-6">
            <div class="tn-img">
                <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen']; ?>" alt="">
                <div class="tn-title">
                    <a href="index.php?p=actualidad/noticias/verNoticia&id=<?php echo $noticia['idNoticia']; ?>"><?php echo $noticia['titulo']; ?></a>
                </div>
                <div class="social ml-auto">
                    <a href=""><i class="fa fa-thumbs-up"></i><?php echo $noticia['likes']; ?></a>
                    <a href="https://www.facebook.com/sharer.php?u=http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=actualidad/noticias/verNoticia&id=<?php echo $noticia['idNoticia'] ?>" target="_black"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?text=Noticia%20NexoMunicipal&url=http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=actualidad/noticias/verNoticia&id=<?php echo $noticia['idNoticia'] ?>" target="_black"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>



<?php mysqli_close($connection); ?>