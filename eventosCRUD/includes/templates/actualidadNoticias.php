<?php 
    //importar la bd
    require 'includes/config/database.php';
    $db = conectarDB();
    //consultar db
    $query = "SELECT * FROM eventos LIMIT ${limite}";
    //resultado db
    $resultado = mysqli_query($db, $query);    
?>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while($evento = mysqli_fetch_assoc($resultado)):?>
        <div class="col">
            <div class="card h-100">
                <img src="imagenes/<?php echo $evento['imagen'];?>" class="card-img-top" style="height: 238px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $evento['titulo'];?></h5>
                    <p class="card-text"><?php echo $evento['descripcion'];?></p>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary"><?php echo $evento['creado'];?></small>
                </div>
            </div>
        </div>  
    <?php endwhile?>
</div>

<?php mysqli_close($db);?>