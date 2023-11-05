<?php 
     $id = $_GET['id'];
     $id = filter_var($id, FILTER_VALIDATE_INT);
     var_dump($id);
    //importar la bd
    require '../../includes/config/database.php';
    $db = conectarDB();
    //consultar db
    $query = "SELECT * FROM eventos WHERE idEvento = ${id}";
    //resultado db
    $resultado = mysqli_query($db, $query);

    if(!$resultado-> num_rows){
        header('Location: ../../../index.php');
    }

    $evento = mysqli_fetch_assoc($resultado);

    include  '../../includes/funciones.php';

    incluirTemplate('header');
?>
    <div class="d-inline-flex p-2 flex-column ">
        <h1><?php echo  $evento['titulo']?></h1>
            <div class=" p-3">
                <img src="../../../imagenes/<?php echo $evento['imagen'];?>" class="card-img-top" width="350" height="500">
            </div>
            <div class="p-3">
                <p> <?php echo $evento ['descripcion']?></p>   
            </div>
    </div>


<?php
    mysqli_close($db);
    incluirTemplate('footer');
?>