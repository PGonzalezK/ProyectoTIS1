<!-- Brand Start -->
<div class="brand">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4">
                <div class="b-logo">
                    <a class="nav-link <?php echo ($pagina == 'home') ? 'active' : null ?>" aria-current="page" href="index.php?p=admin/home">
                        <img src="img/logo-largo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                    
            </div>
            <div class="col-lg-6 col-md-4">
                <div class="b-ads d-flex justify-content-end">
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
                <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Configuraciones Municipales</a>
                        <div class="dropdown-menu">
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/misionvision/index') ? 'active' : ''; ?>" href="index.php?p=admin/misionvision/index">Misión/Visión</a></li>
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/palabras_alcalde/index') ? 'active' : ''; ?>" href="index.php?p=admin/palabras_alcalde/index">Palabras del Alcalde</a></li>
                        </div>
                </div>
                <a id="participacion-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/categorias/categorias') ? 'active' : ''; ?>" href="index.php?p=admin/categorias/categorias">Categoría</a>
                    <a id="participacion-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/mapa/mapa') ? 'active' : ''; ?>" href="index.php?p=admin/mapa/mapa">Mapa</a>
                    <a id="participacion-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'admin/participacion/index') ? 'active' : ''; ?>" href="index.php?p=admin/participacion/index">Contribuciones</a>
                </div>
                </div>
            </div>
        </nav>
    </div>
<!-- Nav Bar End -->

