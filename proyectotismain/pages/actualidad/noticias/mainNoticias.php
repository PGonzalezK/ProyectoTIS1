<?php 
    //conectar a la base de datos
    include("database/connection.php");

    $query = "SELECT idNoticia, titulo, descripcion, imagen, creado, visitas, likes, dislikes, num_valorizaciones, COUNT(valorizacion) AS num_valorizaciones, AVG(valorizacion) AS promedio_valorizacion FROM noticias GROUP BY idNoticia LIMIT ${limite}";
    // Resultado de la base de datos
    $resultado = mysqli_query($connection, $query);  
?>

<div class="row tn-slider">
        <?php 
            while ($noticia = mysqli_fetch_assoc($resultado)): 
        ?>
            <div class="col-md-6">
                <div class="tn-img">
                    <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen']; ?>" alt="">
                    <div class="tn-title">
                        <a href="index.php?p=actualidad/noticias/verNoticia&id=<?php echo $noticia['idNoticia'];?>"><?php echo $noticia['titulo']; ?></a>
                    </div>
                    <div class="social ml-auto">
                        <a href=""><i class="fa fa-thumbs-up"></i><?php echo $noticia['likes'];?></a>
                    </div>
                </div>
            </div>
        <?php endwhile ?>   
    </div>



<?php mysqli_close($connection);?>