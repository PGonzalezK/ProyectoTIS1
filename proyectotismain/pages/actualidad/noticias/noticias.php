<?php

include("database/connection.php");

?>
<div>
    <?php require('includes/users/navbar_users.php'); ?>
</div>

<div class="container mt-3">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="form-inline">
        <input type="hidden" name="p" value="actualidad/noticias/noticias&categoria=<?php echo $filtroCategoria; ?>">
        <label for="categoria" class="mr-2">Filtrar por Categoría:</label>
        <select name="categoria" id="categoria" class="form-control mr-2">
            <!-- Aquí obtén dinámicamente las categorías de la base de datos y genera las opciones -->
            <?php
                $queryCategorias = "SELECT * FROM categoria";
                $resultCategorias = mysqli_query($connection, $queryCategorias);

                while ($categoria = mysqli_fetch_assoc($resultCategorias)) {
                    echo "<option value='{$categoria['id_categoria']}'>{$categoria['nombre']}</option>";
                }
            ?>
        </select>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>
</div>


<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                <?php
                    $limite = 5;
                    include 'pages/actualidad/noticias/mainNoticias.php';
                ?>
            </div>
        </div>
    </div>
</div>
