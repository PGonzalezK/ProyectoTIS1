<?php
//conectar a la base de datos
include("database/connection.php");

$query = "SELECT * FROM eventos GROUP BY idEvento";
// Resultado de la base de datos
$resultado = mysqli_query($connection, $query);
?>


<div class="row">
<?php
    while ($evento = mysqli_fetch_assoc($resultado)) :
    ?>
    <div class="col-md-4">
        <div class="mn-img">
        <img src="pages/admin/eventos_adm/imagenes/<?php echo $evento['imagen']; ?>" alt="">
            <div class="mn-title">
            <a href="index.php?p=actualidad/eventos/verEvento&id=<?php echo $evento['idEvento']; ?>"><?php echo $evento['titulo'] . '<br>' . $evento['direccion']; ?></a>
            </div>
        </div>
    </div>
    <?php endwhile ?>
</div>

<?php mysqli_close($connection); ?>