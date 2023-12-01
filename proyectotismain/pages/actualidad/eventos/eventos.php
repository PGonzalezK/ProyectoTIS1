<div>
    <?php require('includes/users/navbar_users.php'); ?>
</div>

<div class="row">
    <div class="col">
    </div>
   
    <br>
    <br>
    <div class="container text-center">
    <div class="container text-center pt-3">
    <h1>CATÁLOGO DE EVENTOS</h1>
</div>
        <br>

    <!-- Main News Start-->
    <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                    <?php
                        $limite = 100;
                        include 'pages/actualidad/eventos/catalogoEventos.php';
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main News End-->



</div>