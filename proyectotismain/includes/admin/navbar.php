<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom colornav ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <?php
            if (isset($_SESSION["email"])) {
            ?>
            <img src="pages\auth\images\logo.png" class="¿img-fluid rounded imagen-nexo" width="200" >
            <?php } ?>
        </div>
    </div>
</nav>