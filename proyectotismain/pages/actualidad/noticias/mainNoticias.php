<?php 
    //conectar a la base de datos
    include("database/connection.php");

    // Definir límite
    $limite = 5; // Reemplaza esto con el valor que desees

    $query = "SELECT idNoticia, titulo, descripcion, imagen, creado, visitas, likes, dislikes, num_valorizaciones, COUNT(valorizacion) AS num_valorizaciones, AVG(valorizacion) AS promedio_valorizacion FROM noticias GROUP BY idNoticia LIMIT ${limite}";
    // Resultado de la base de datos
    $resultado = mysqli_query($connection, $query);  
?>



<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while ($noticia = mysqli_fetch_assoc($resultado)): ?>
    <div class="col">
        <div class="card h-100">
            <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen']; ?>" class="card-img-top"
                style="height: 238px">
            <div class="card-body">
                <h5 class="card-title"><?php echo $noticia['titulo']; ?></h5>
                <p class="card-text"><?php echo $noticia['descripcion']; ?></p>
                <form method="post" action="index.php?p=/actualidad/noticias/action/procesar_valorizacion">
                    <input type="hidden" name="id_noticia" value="<?php echo $noticia['idNoticia']; ?>">
                    <label for="valorizacion">Valorizar:</label>
                    <input type="radio" name="valorizacion" value="1"> 1
                    <input type="radio" name="valorizacion" value="2"> 2
                    <input type="radio" name="valorizacion" value="3"> 3
                    <input type="radio" name="valorizacion" value="4"> 4
                    <input type="radio" name="valorizacion" value="5"> 5
                    <input type="submit" value="Valorizar">
                </form>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary"><?php echo $noticia['creado']; ?></small>
                <br>
                <small class="text-body-secondary">Visitas: <?php echo $noticia['visitas']; ?></small>
                <br>
                <small class="text-body-secondary">Likes: <?php echo $noticia['likes']; ?></small>
                <br>
                <small class="text-body-secondary">Dislikes: <?php echo $noticia['dislikes']; ?></small>
                <br>
                <?php 
                        $promedio_valorizacion = 0;
                        if (isset($noticia['num_valorizaciones']) && $noticia['num_valorizaciones'] > 0) {
                            $promedio_valorizacion = $noticia['promedio_valorizacion'];
                        }
                        
                        echo '<small class="text-body-secondary">Valorización: ' . number_format($promedio_valorizacion, 1) . '</small>';
                    ?>
                
            </div>
            <div class="d-grid gap-2">
                <a class="btn btn-primary"
                    href="index.php?p=actualidad/noticias/verNoticia&id=<?php echo $noticia['idNoticia']; ?>"
                    role="button">Ver noticia</a>
            </div>
        </div>
    </div>
    <?php endwhile ?>
</div>
<?php mysqli_close($connection);?>