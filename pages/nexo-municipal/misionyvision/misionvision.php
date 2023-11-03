<?php
//include("middleware/auth.php");
include("database/connection.php");

// Consulta para obtener la Misión y la Visión desde la base de datos
$query = "SELECT * FROM misionvision";
$result = mysqli_query($connection, $query);

$mision = '';
$vision = '';

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['tipo'] === 'mision') {
        $mision = $row['contenido'];
    } elseif ($row['tipo'] === 'vision') {
        $vision = $row['contenido'];
    }
}
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

        </div>
    </div>
    
<div class="container text-center">
    <div class="mision-backg">
        <br><br>
        <h2 class="card-header text-left"><b class="titulo">Misión y Visión</b></h2>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <h2 class="card-header text-left"><b>Misión</b></h2>
                    <div class="card-body">
                        <h6><?php echo $mision; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <h2 class="card-header text-left"><b>Visión</b></h2>
                    <div class="card-body">
                        <h6><?php echo $vision; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
