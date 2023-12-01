<?php
//conectar a la base de datos
include("database/connection.php");

// Inicializar la variable $condicion_categoria
$condicion_categoria = "";

// Verificar si se ha seleccionado una categoría
if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
    $id_categoria = mysqli_real_escape_string($connection, $_GET['categoria']);
    $condicion_categoria = "WHERE categoria.id_categoria = $id_categoria";
}

$query = "SELECT * FROM noticias
          LEFT JOIN categoria ON noticias.id_categoria = categoria.id_categoria
          $condicion_categoria
          LIMIT ${limite}";

//resultado db
$resultado = mysqli_query($connection, $query);
?>

<div class="row">
    <?php
    while ($noticia = mysqli_fetch_assoc($resultado)) :
        if ($noticia['nombre'] === 'Entretenimiento') :
    ?>
            <div class="col-md-4">
                <div class="mn-img">
                    <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen']; ?>" alt="">
                    <div class="mn-title">
                        <a href="index.php?p=actualidad/noticias/verNoticia&id=<?php echo $noticia['idNoticia']; ?>">
                            <?php echo $noticia['titulo']; ?> (<?php echo $noticia['nombre']; ?>)
                        </a>
                    </div>
                </div>
            </div>
    <?php
        endif;
    endwhile ?>
</div>

