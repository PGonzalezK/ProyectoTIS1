<?php
//conectar a la base de datos
include("database/connection.php");

$query = "SELECT * FROM eventos GROUP BY idEvento";
// Resultado de la base de datos
$resultado = mysqli_query($connection, $query);
?>

<div class="row tn-slider">
    <?php
    while ($evento = mysqli_fetch_assoc($resultado)) :
    ?>
        <div class="col-md-6">
            <div class="tn-img">
                <img src="pages/admin/eventos_adm/imagenes/<?php echo $evento['imagen']; ?>" alt="">
                <div class="tn-title">
                    <a href="index.php?p=actualidad/eventos/verNoticia&id=<?php echo $evento['idEvento']; ?>"><?php echo $evento['titulo']; ?></a>
                </div>
                <div class="social ml-auto">
                    <a href=""><i class="fa fa-thumbs-up"></i><?php echo $evento['likes']; ?></a>
                    <a href="https://www.facebook.com/sharer.php?u=http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=actualidad/eventos/verEvento&id=<?php echo $evento['idNoticia'] ?>" target="_black"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?text=Noticia%20NexoMunicipal&url=http://localhost/xampp/ProyectoTIS1/proyectotismain/index.php?p=actualidad/evento/verEvento&id=<?php echo $evento['idNoticia'] ?>" target="_black"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>



<?php mysqli_close($connection); ?>