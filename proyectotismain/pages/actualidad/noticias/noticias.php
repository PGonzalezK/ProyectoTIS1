<?php

include("database/connection.php");

?>

<div class="container text-center">
    <div class="row">
        <div class="col">
            <?php require('includes/users/navbar_users.php'); ?>
        </div>
    </div>
    <br>
</div>


<div class="noticiasbackg">
    <div class="container text-center">
        <!-- Aquí empiezan las publicaciones de noticias -->
        <section class="row contenedorNoticias ">
            <?php
            $limite = 99;
            include 'pages/actualidad/noticias/mainNoticias.php';
            ?>
        </section>
        <!-- Termina sección noticias -->
    </div>
</div>
