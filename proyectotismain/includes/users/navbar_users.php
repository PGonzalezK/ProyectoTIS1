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
                <a class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'home') ? 'active' : ''; ?>" href="index.php?p=home">Inicio</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Actualidad</a>
                        <div class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p']  == 'actualidad/noticias/noticias') ? 'active' : ''; ?>" href="index.php?p=actualidad/noticias/noticias">Noticias</a></li>
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p']== 'actualidad/eventos/eventos') ? 'active' : ''; ?>" href="index.php?p=actualidad/eventos/eventos">Eventos</a></li>
                        </div>
                    </div>
                    <a id="emprendedores-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'emprendedores/emprendedores') ? 'active' : ''; ?>" href="index.php?p=emprendedores/emprendedores">Emprendedores</a>

                    <a id="participacion-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'mapa/mapa') ? 'active' : ''; ?>" href="index.php?p=mapa/mapa">Mapa</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">NEXO MUNICIPAL</a>
                        <div class="dropdown-menu">
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'nexo-municipal/misionyvision/misionvision') ? 'active' : ''; ?>" href="index.php?p=nexo-municipal/misionyvision/misionvision">Mision y Vision</a></li>
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'nexo-municipal/alcalde/alcalde') ? 'active' : ''; ?>" href="index.php?p=nexo-municipal/alcalde/alcalde">Palabras del alcalde</a></li>
                            <li><a class="dropdown-item <?php echo (isset($_GET['p']) && $_GET['p'] == 'nexo-municipal/direccionesmunicipales/direcciones') ? 'active' : ''; ?>" href="index.php?p=nexo-municipal/direccionesmunicipales/direcciones">Direcciones Municipales</a></li>
                        </div>
                    </div>
                    <a id="participacion-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'participacion/participacion') ? 'active' : ''; ?>" href="index.php?p=participacion/participacion">Participación</a>
                    <a id="participacion-link" class="nav-item nav-link <?php echo (isset($_GET['p']) && $_GET['p'] == 'emprendimiento/create') ? 'active' : ''; ?>" href="index.php?p=emprendimiento/create">Subir mi Emprendimiento</a>
                </div>
                <div class="social ml-auto">
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->




