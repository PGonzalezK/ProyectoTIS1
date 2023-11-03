<?php
//include("middleware/auth.php");
include("database/connection.php");

$query = "SELECT * FROM palabrasalcalde";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

$titulo = $row['titulo'];
$contenido = $row['contenido'];
$nombre_alcalde = $row['nombre_alcalde'];
$imagen = $row['imagen'];
$fecha = $row['fecha'];

?>
<div class="container text-center">
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
            </ul>
        </div>
    </div>

    <br>
    <br>

    <div class="card mb-3" style="max-height: 1000px;">
        <div class="row g-0">
            <div class="col-md-4 text-center d-flex align-items-center justify-content-center">
                <img src="<?php echo $imagen; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $titulo; ?></h5>
                    <p class="card-text"><?php echo $contenido; ?></p>
                    <p class="card-text"><strong><?php echo $nombre_alcalde; ?></strong>, Alcalde</p>
                </div>
            </div>
        </div>
    </div>
</div>
