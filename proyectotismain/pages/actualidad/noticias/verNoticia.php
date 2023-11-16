<?php 
     $id = $_GET['id'];
     $id = filter_var($id, FILTER_VALIDATE_INT);
    //importar la bd
    include("database/connection.php");
    //consultar db
    $query = "SELECT * FROM noticias WHERE idNoticia = ${id}";
    //resultado db
    $resultado = mysqli_query($connection, $query);

    if(!$resultado-> num_rows){
        header('Location: ../../../index.php');
    }

    $noticia = mysqli_fetch_assoc($resultado);

?>
    <div class="row">
        <div class="col">

        </div>
        <?php require('includes/users/navbar_users.php'); ?>

    </div>
    <div class="d-inline-flex p-2 flex-column ">
        <h1><?php echo  $noticia['titulo']?></h1>
            <div class=" p-3">
                <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen'];?>" class="card-img-top" width="350" height="500">
            </div>
            <div class="p-3">
                <p> <?php echo $noticia['descripcion']?></p>   
            </div>
    </div>


<?php
    mysqli_close($connection);
?>