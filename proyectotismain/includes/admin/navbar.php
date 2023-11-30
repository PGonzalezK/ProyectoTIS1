<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="pages\auth\images\logo-largo.png" alt="Logo" height="40">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <?php
            if (isset($_SESSION["email"])){
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=admin/home">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'users') !== false) ? 'active' : null ?>" href="index.php?p=admin/users/index">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'noticias') !== false) ? 'active' : null ?>" href="index.php?p=admin/noticias_adm/index">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'eventos') !== false) ? 'active' : null ?>" href="index.php?p=admin/eventos_adm/index">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'roles') !== false) ? 'active' : null ?>" href="index.php?p=admin/roles/index">Roles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'misionvision') !== false) ? 'active' : null ?>" href="index.php?p=admin/misionvision/index">Mision y Vision</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'palabras_alcalde') !== false) ? 'active' : null ?>" href="index.php?p=admin/palabras_alcalde/index">Palabras del Alcalde</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'direccionesMunicipales') !== false) ? 'active' : null ?>" href="index.php?p=admin/direccionesMunicipales/index">Direcciones Municipales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'participacion') !== false) ? 'active' : null ?>" href="index.php?p=admin/participacion/index">Participacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'backgrounds') !== false) ? 'active' : null ?>" href="index.php?p=admin/backgrounds/index">Fondos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'emprendedores') !== false) ? 'active' : null ?>" href="index.php?p=admin/emprendedores/index">Emprendedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'graficos') !== false) ? 'active' : null ?>" href="index.php?p=admin/graficos/graficos">Graficos</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="index.php?p=admin/profile_admin" class="btn btn-sm btn-outline-primary me-2">Perfil</a>
                    <a href="pages/auth/actions/logout.php" class="btn btn-sm btn-outline-danger">Cerrar Sesión</a>
                </div>
            <?php
           } else {
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=home">Inicio</a>
                    </li>
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

