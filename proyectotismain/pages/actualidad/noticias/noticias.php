<?php

include("database/connection.php");

?>

<div>
        <?php require('includes/users/navbar_users.php'); ?>
</div>


<div class="noticiasbackg">
    <div class="container text-center">
        <!-- Aquí empiezan las publicaciones de noticias -->
        <section class="row contenedorNoticias ">
            <?php
            $limite = 99;
            include 'pages/admin/noticias_adm/templates/mainNoticias.php';
            ?>
        </section>
        <!-- Termina sección noticias -->
    </div>
</div>
