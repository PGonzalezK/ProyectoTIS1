<?php
//include("middleware/auth.php");
include("database/connection.php");

$query = "SELECT * FROM palabrasalcalde";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$titulo = $row['titulo'];
$contenido = $row['contenido'];
$nombre_alcalde = $row['nombre_alcalde'];
$imagen = $row['imagen'];
$fecha = $row['fecha'];

?>
<div class="container text-center">
    <div class="row">
        <div class="col">

        </div>

        <?php require ('includes/users/navbar_users.php'); ?>
    </div>

    <br>
    <br>

    <div class="card mb-3" style="max-height: 1000px;">
        <div class="row g-0">
            <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
                <img src="pages/admin/palabras_alcalde/imagen/alcalde-foto.jpg" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $titulo; ?></h5>
                    <p class="card-text"><?php echo $contenido; ?></p>
                    <p class="card-text"><strong><?php echo $nombre_alcalde; ?></strong>, Alcalde</p>
                </div>
            </div>
        </div>
    </div>
</div>
