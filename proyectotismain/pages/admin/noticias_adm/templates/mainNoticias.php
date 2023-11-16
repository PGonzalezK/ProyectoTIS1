<?php 
    //conectar a la base de datos
    include("database/connection.php");

    $query = "SELECT * FROM noticias LIMIT ${limite}";
    //resultado db
    $resultado = mysqli_query($connection, $query);  
?>



<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while($noticia = mysqli_fetch_assoc($resultado)):?>
        <div class="col">
            <div class="card h-100">
                <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen'];?>" class="card-img-top" style="height: 238px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $noticia['titulo'];?></h5>
                        <p class="card-text"><?php echo $noticia['descripcion'];?></p>
                    </div>
                        <div class="card-footer">
                            <small class="text-body-secondary"><?php echo $noticia['creado'];?></small>
                        </div>
                <div class="d-grid gap-2">
                        <a class="btn btn-primary" href="index.php?p=actualidad/noticias/verNoticia&id=<?php echo $noticia['idNoticia'];?>" role="button">Ver noticia</a>
                </div>
            </div>
        </div>  
    <?php endwhile?>
</div>

<?php mysqli_close($connection);?>