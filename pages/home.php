<?php
// Descomentar linea 3 si es que se quiere usar la autenticación para esta página
//require("middleware/auth.php");
?>

<div class="container text-center">
        <div class="row">
            <div class="col">

            </div>

            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a id="emprendedores-link" class="nav-link" href="pages\emprendedores.php">Emprendedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages\mapa.php">Mapa</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false" value="dd">Actualidad</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Noticias</a></li>
                            <li><a class="dropdown-item" href="#">Eventos</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Nexo Municipal</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Mision y Vision</a></li>
                            <li><a class="dropdown-item" href="#">Palabras del alcalde</a></li>
                            <li><a class="dropdown-item" href="#">Direcciones Municipales</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a id="participacion-link" class="nav-link" href="pages\participacion.php">Parcitipacion</a>
                    </li>

            </div>
        </div>
            
        </div>
    </div>
</div>