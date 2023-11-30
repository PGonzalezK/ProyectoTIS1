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
                <?php
                    $limite = 5;
                    include 'pages/actualidad/noticias/mainNoticias.php';
                ?>
            </div>
        </div>
    </div>
</div>
