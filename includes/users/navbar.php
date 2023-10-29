<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul>
                <div class="row">
                    <div class="col">
                        <i class="fa-brands fa-instagram fa-2xl"></i>
                        <i class="fa-brands fa-facebook fa-2xl"></i>
                        <i class="fa-brands fa-x-twitter fa-2xl"></i>
                    </div>
            </ul>

            
            <?php
            if (isset($_SESSION["rut"])) {
                ?>





                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page"
                            href="index.php?p=home">Inicio</a>
                    </li>


                </ul>
                
                <ul class="navbar-nav me-auto mb-2 mb-lh-0 ">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit">Search</button>
                    </form>
                </ul>
                <div class="d-flex">
                    <a href="index.php?p=auth/profile" class="btn btn-sm btn-outline-primary me-2">Perfil</a>
                    <a href="pages/auth/actions/logout.php" class="btn btn-sm btn-outline-danger">Cerrar Sesión</a>
                </div>
                <!-- <a href="pages/auth/actions/logout.php">Cerrar Sesión</a> -->
                <?php
            } else {
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page"
                            href="index.php?p=home">Inicio</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto mb-2 mb-lh-0 ">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit">Search</button>
                    </form>
                </ul>
                <div class="d-flex">
                    <a href="index.php?p=auth/login" class="btn btn-sm btn-outline-primary me-2">Iniciar Sesión</a>
                    <a href="index.php?p=auth/register" class="btn btn-sm btn-outline-success">Registrarse</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</nav>