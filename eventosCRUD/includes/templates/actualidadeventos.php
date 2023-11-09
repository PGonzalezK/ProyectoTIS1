<?php 
    //importar la bd
    $db = conectarDB();
    //consultar db
    $query = "SELECT * FROM eventos LIMIT ${limite}";
    //resultado db
    $resultado = mysqli_query($db, $query);    
?>

<div id="carouselExampleInterval" class="carousel slide mx-auto" data-bs-ride="carousel" style="width:450px" ;>
        <div class="carousel-inner">
        <?php while($evento = mysqli_fetch_assoc($resultado)):?>
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="imagenes/<?php echo $evento['imagen'];?>"
                    class="d-block w-100" alt="..." width="450" height="300">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $evento['titulo'];?></h5>
                    <p><?php echo $evento['direccion']; ?></p>
                </div>
            </div>
            <?php endwhile?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>