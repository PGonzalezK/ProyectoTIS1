<?php
    include 'includes/funciones.php';

    incluirTemplate('header');
// Descomentar linea 3 si es que se quiere usar la autenticación para esta página
//require("middleware/auth.php");
?>



<div class="container text-center">
    <!--esta es la seccion del nav-->
    <div class="row">
        <div class="col">
        </div>
        <div class="col-12">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=home">Inicio</a>
                </li>
                <li class="nav-item">
                    <a id="emprendedores-link" class="nav-link"
                        href="index.php?p=emprendedores/emprendedores">Emprendedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=mapa/mapa">Mapa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false" value="dd">Actualidad</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?p=actualidad/noticias/noticias">Noticias</a></li>
                        <li><a class="dropdown-item" href="index.php?p=actualidad/eventos/eventos">Eventos</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Nexo Municipal</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?p=nexo-municipal/misionyvision/misionvision">Mision
                                y Vision</a></li>
                        <li><a class="dropdown-item" href="index.php?p=nexo-municipal/alcalde/alcalde">Palabras del
                                alcalde</a></li>
                        <li><a class="dropdown-item"
                                href="index.php?p=nexo-municipal/direccionesmunicipales/direcciones">Direcciones
                                Municipales</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a id="participacion-link" class="nav-link"
                        href="index.php?p=participacion\participacion">Participacion</a>
                </li>
        </div>
    </div>
    <!--finaliza seccion nav-->


    <!--aqui empiezan las publicaciones de noticias-->
    <section class="row contenedorNoticias">
        <?php 
            $limite= 3; 
            include 'includes/templates/actualidadNoticias.php';
        ?>
    </section>
    <!--termina seccion noticias-->

    
    <br><br>
    <!--seccion eventos-->
   <section class="contenedorEventos">
        <?php   include 'includes/templates/actualidadEventos.php';?>
   </section>
    <!-- Fin seccion eventos-->
</div>

</div>

<?php
    incluirTemplate('footer');
?>