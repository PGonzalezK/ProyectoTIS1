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
                        <a id="emprendedores-link" class="nav-link" href="pages\emprendedores\emprendedores.php">Emprendedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages\mapa\mapa.php">Mapa</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false" value="dd">Actualidad</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pages\actualidad\noticias\noticias.php">Noticias</a></li>
                            <li><a class="dropdown-item" href="pages\actualidad\eventos\eventos.php">Eventos</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">Nexo Municipal</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pages\nexo-municipal\misionyvision\misionvision.php">Mision y Vision</a></li>
                            <li><a class="dropdown-item" href="pages\nexo-municipal\alcalde\alcalde.php">Palabras del alcalde</a></li>
                            <li><a class="dropdown-item" href="pages\nexo-municipal\direccionesmunicipales\direcciones.php">Direcciones Municipales</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a id="participacion-link" class="nav-link" href="pages\participacion\participacion.php">Participacion</a>
                    </li>

            </div>
        </div>

        
            
        </div>
    </div>
</div>