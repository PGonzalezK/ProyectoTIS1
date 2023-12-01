<?php
include("database/connection.php");
include_once 'includes/funciones/funciones.php';

// Obtener todas las categorías
$categorias = obtenerCategorias();
?>

<div>
    <?php require('includes/users/navbar_users.php'); ?>
</div>


<!-- Título del catálogo -->
<div class="container text-center pt-3">
    <h1>CATÁLOGO DE NOTICIAS</h1>
</div>


<!-- Category News Start -->
<div class="cat-news pt-4">
    <div class="container">
        <div class="row">
            <?php foreach ($categorias as $categoria) :
                $idCategoria = $categoria['id_categoria'];
                $nombreCategoria = $categoria['nombre'];
                $noticias = obtenerNoticiasPorCategoria($idCategoria, 3);

                if (!empty($noticias)) :
            ?>
                    <div class="col-md-6">
                        <h2><?= $nombreCategoria ?></h2>
                        <div class="row cn-slider">
                            <?php foreach ($noticias as $noticia) : ?>
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <img src="pages/admin/noticias_adm/imagenes/<?= $noticia['imagen'] ?>" alt="">
                                        <div class="cn-title">
                                            <a href="index.php?p=actualidad/noticias/verNoticia&id=<?= $noticia['idNoticia'] ?>">
                                                <?= $noticia['titulo'] ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
</div>
<!-- Category News End -->


