<?php 

    require('database/connection.php');
    require('includes/users/navbar_users.php'); 
    $query = "SELECT * FROM emprendedores WHERE aprobado = 1";
    $resultado = mysqli_query($connection, $query);

?>




















<div class="container mt-4">
    <h2 class="text-center mb-4">Emprendedores Aprobados</h2>

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = true;
            while ($row = mysqli_fetch_array($resultado)) {
            ?>
                <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                    <img src="pages/admin/emprendedores/imagenes/<?php echo $row['foto']; ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: white"><?php echo $row['nombre']; ?></h5>
                        <p style="color: white"><?php echo $row['descripcion']; ?></p>
                        <p style="color: white"> <?php echo $row['direccion']; ?></p>
                        <!-- Puedes agregar más detalles según tus necesidades -->
                    </div>
                </div>
            <?php
                $active = false;
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<?php
mysqli_close($connection);
?>
