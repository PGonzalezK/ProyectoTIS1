<?php 
    //importar la bd
    include("database/connection.php");
    //consultar db
    $query = "SELECT * FROM eventos LIMIT ${limite}";
    //resultado db
    $resultado = mysqli_query($connection, $query);    
?>


<div class="row">
    <?php while ($evento = mysqli_fetch_assoc($resultado)): ?>
        <div class="col-md-6">
            <div class="tn-img">
                <img src="pages/admin/eventos_adm/imagenes/<?php echo $evento['imagen']; ?>" alt="">
                <div class="tn-title">
                <a href="index.php?p=actualidad/eventos/verEvento&id=<?php echo $evento['idEvento']; ?>"><?php echo $evento['titulo'] . '<br>' . $evento['direccion']; ?></a>
                </div>
            </div>
        </div>
    <?php endwhile ?>
</div>