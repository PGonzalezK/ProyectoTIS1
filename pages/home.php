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

    <div class="iniciobackg">
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="https://munipuqueldon.cl/wp-content/uploads/2023/07/IMG_4378-scaled.jpg" class="card-img-top"
                    style="height: 238px">
                <div class="card-body">
                    <h5 class="card-title">Municipio de Puqueldón entrega 50 Becas a estudiantes destacados de la
                        comuna.</h5>
                    <p class="card-text">Durante la mañana del 20 de julio, en el salón principal del Edificio
                        Polifuncional,
                        se realizó...</p>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">17 Octubre 2023</small>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="https://munipuqueldon.cl/wp-content/uploads/2023/06/DSC_0467-1024x683.jpg"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Egresan los primeros miembros del centro diurno del adulto mayor</h5>
                    <p class="card-text">Este centro, que abrió sus puertas a la comunidad en diciembre del 2021 ...
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">18 Octubre 2023</small>
                </div>
            </div>

        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://munipuqueldon.cl/wp-content/uploads/2023/06/DSC_0319-1024x683.jpg"
                    class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Día Mundial del Medioambiente: Un llamado a la protección de los
                        ecosistemas locales</h5>
                    <p class="card-text">En un esfuerzo conjunto por concientizar sobre la importancia de preservar
                        el medio... </p>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">19 Octubre 2023</small>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div id="carouselExampleInterval" class="carousel slide mx-auto" data-bs-ride="carousel" style="width: 500px" ;">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHyRrkW-Y8KfqfbBKyqUcnkiRZRbduCun3yYkEMAU7H4xApUg7FbKPF366MQ&s=10"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Mayumana en Gimnasio Municipal de Concepción</h5>
                    <p>Gimnasio Municipal De Concepción
                        Av. Gral. Oscar Bonilla 2700, Concepciónve placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="https://static.puntoticket.com/images/eventos/edo026_calugalistado.jpg" class="d-block w-100"
                    alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>EDO CAROE en Teatro UdeC</h5>
                    <p> Libertador Gral. Bernardo O'Higgins 650, Concepción, Bío Bío</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSy6dL-IKg3yqQkrpHgrzaQeqFM4hMANJSUcKGMMAfFFl-omKSnOBPDZjxDGw&s"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> Bancario vs Municipales Olavarría</h5>
                    <p>Collao 481, Concepción, Bío Bío</p>
                </div>

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>



    
</div>


