<?php

include("database/connection.php");

?>
<div>
    <?php require('includes/users/navbar_users.php'); ?>
</div>

<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
                
                <!-- Agrega un selector de categorías -->
                <label for="categoria">Filtrar por categoría:</label>
                <select id="categoria" name="categoria">
                    <option value="">Todas las categorías</option>
                    <?php
                        // Obtener categorías desde la base de datos
                        $query_categorias = "SELECT id_categoria, nombre FROM categoria";
                        $resultado_categorias = mysqli_query($connection, $query_categorias);

                        while ($categoria = mysqli_fetch_assoc($resultado_categorias)) :
                    ?>
                        <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre']; ?></option>
                    <?php endwhile ?>
                </select>

                <!-- Contenedor para mostrar noticias sin filtrar -->
                
                <div id="noticias-todas">
                    <?php
                        $limite = 5;
                        include 'pages/actualidad/noticias/mainNoticias.php';
                    ?>
                </div>

                <!-- Contenedor para mostrar noticias filtradas -->
                <div id="noticias-filtradas"></div>
               
            </div>
        </div>
    </div>
</div>

