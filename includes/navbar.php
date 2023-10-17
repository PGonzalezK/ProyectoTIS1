
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($pagina == 'home')? 'active' : null ?>" aria-current="page" href="index.php?p=home">Inicio</a>
                    <a class="nav-link <?php echo ($pagina == 'home')? 'active' : null ?>" aria-current="page" href="index.php?p=home">Inicia</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                
                <button class="btn btn-outline-success" type="submit">Iniciar Sesion</button>
            </form>
        </div>
    </div>
</nav>