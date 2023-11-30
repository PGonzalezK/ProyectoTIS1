<?php
// Descomentar la línea 3 si se desea utilizar la autenticación para esta página
  //  require("middleware/auth.php");
?>

<div>
    <?php require('includes/users/navbar_users.php'); ?>
</div>

<!--Empieza sección slider noticias-->
<div class="top-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 tn-left">
            <h2>Noticias</h2>
                <?php
                    $limite = 5;
                    include 'pages/actualidad/noticias/mainNoticias.php';
                ?>
            </div>
            <div class="col-md-6 tn-right">
            <h2>Eventos</h2>
                    <?php
                    include 'pages/admin/eventos_adm/templates/mainEventos.php';
                    ?>
            </div>
        </div>
    </div>
</div>

