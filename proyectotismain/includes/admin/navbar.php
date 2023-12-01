<nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary border-right">
    <div class="container-fluid">
        <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=admin/home">
            <img src="pages\auth\images\logo-largo.png" alt="Logo" height="40" href="index.php?p=home">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <?php
            if (isset($_SESSION["email"])) {
            ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                  
                    
                  
                 
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
                        <a class="nav-link <?php echo (strpos($pagina, 'emprendedores') !== false) ? 'active' : null ?>" href="index.php?p=admin/emprendedores/index">Emprendedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'mapa') !== false) ? 'active' : null ?>" href="index.php?p=admin/mapa/mapa">Mapa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($pagina, 'categorias') !== false) ? 'active' : null ?>" href="index.php?p=admin/categorias/categorias">Categorias</a>
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
                    <!-- Agrega más elementos según sea necesario -->
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



<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'home') ? 'active' : ''; ?>" href="index.php?p=admin/home">Inicio</a>
                <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Usuarios/Roles</a>
                        <div class="dropdown-menu">
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/users/index') ? 'active' : ''; ?>" href="index.php?p=admin/users/index">Usuarios</a></li>
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/roles/index') ? 'active' : ''; ?>" href="index.php?p=admin/roles/index">Roles</a></li>
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/emprendedores/index') ? 'active' : ''; ?>" href="index.php?p=admin/emprendedores/index">Emprendedores</a></li>
                        
                        </div>
                    </div>
                <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Gestion Actualidad</a>
                        <div class="dropdown-menu">
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/noticias_adm/index') ? 'active' : ''; ?>" href="index.php?p=admin/noticias_adm/index">Noticias</a></li>
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/eventos_adm/index') ? 'active' : ''; ?>" href="index.php?p=admin/eventos_adm/index">Eventos</a></li>
                        </div>
                    </div>
                    <a id="emprendedores-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'emprendedores/emprendedores') ? 'active' : ''; ?>" href="index.php?p=emprendedores/emprendedores">Emprendedores</a>
                    <a id="participacion-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/mapa/mapa') ? 'active' : ''; ?>" href="index.php?p=admin/mapa/mapa">Mapa</a>
                    <a id="participacion-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/participacion/index') ? 'active' : ''; ?>" href="index.php?p=admin/participacion/index">Contribuciones</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->

