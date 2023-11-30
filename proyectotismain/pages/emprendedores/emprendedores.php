<?php 

    require('database/connection.php');
    require('includes/users/navbar_users.php'); 
    $query = "SELECT * FROM emprendedores WHERE aprobado = 1";
    $resultado = mysqli_query($connection, $query);

?>


<div class="row">
        <?php while ($row = mysqli_fetch_array($resultado)) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="pages/admin/emprendedores/imagenes/<?php echo $row['foto']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                        <p class="card-text"><?php echo $row['descripcion']; ?></p>
                        <!-- Puedes agregar más detalles según tus necesidades -->
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>