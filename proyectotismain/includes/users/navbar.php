<!-- Brand Start -->
<div class="brand">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="b-logo">
                    <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home">
                        <img src="img/logo-largo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                    
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="b-ads d-flex justify-content-end"> <!-- Añadido justify-content-end aquí -->
                    <?php
                    if (isset($_SESSION["email"])) {
                        ?>
                        <a href="index.php?p=auth/profile" class="btn">Perfil</a>
                        <a href="pages/auth/actions/logout.php" class="btn btn-sm btn-outline-danger">Cerrar Sesión</a>
                        <?php
                    } else {
                        ?>
                        <div class="d-flex">
                            <a href="index.php?p=auth/login" class="btn">Iniciar Sesión</a>
                            <a href="index.php?p=auth/register" class="btn">Registrarse</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand End -->


