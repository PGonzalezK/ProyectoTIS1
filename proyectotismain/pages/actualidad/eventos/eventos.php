<div class="row">
    <div class="col">

    </div>
    <?php require ('includes/users/navbar_users.php'); ?>
   
    <br>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="colu-sm-6 d-flex justify-content-center">
                <div class="card">
                    <h2 class="card-header"><b>EVENTOS</b></h2>
                </div>
            </div>
        </div>

        <br>
                <!-- Sección eventos -->
                <section class="contenedorEventos">
            <?php
            $limite = 100;
            include 'pages/admin/eventos_adm/templates/mainEventos.php';
            ?>
        </section>
        <!-- Fin sección eventos -->
</div>