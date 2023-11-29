<?php
// Descomentar la línea 3 si se desea utilizar la autenticación para esta página
  //  require("middleware/auth.php");
?>

<div class="container text-center">
    <div class="row">
        <div class="col">

        </div>
        <?php require('includes/users/navbar_users.php'); ?>

    </div>
</div>
<div class="iniciobackg">
    <div class="container text-center">
        <!-- Aquí empiezan las publicaciones de noticias -->
        <section class="row contenedorNoticias ">
            <?php
            $limite = 3;
            include 'pages/actualidad/noticias/mainNoticias.php';
            ?>
        </section>
        <!-- Termina sección noticias -->
        <br><br><br>
        <!-- Sección eventos -->
        <section class="contenedorEventos">
            <?php
            include 'pages/admin/eventos_adm/templates/mainEventos.php';
            ?>
        </section>
        <!-- Fin sección eventos -->
    </div>
</div>