<!DOCTYPE html>
<html lang="es">

<head>
    <title>Nexo Municipal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body>
    <div class="min-vh-100">
    <?php require('C:\xampp\htdocs\xampp\ProyectoTIS1\includes\users\navbar.php'); ?>

        <div class="container text-center">
            <div class="row">
                <div class="col">

                </div>

                <div class="col-12">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="..\index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a id="emprendedores-link" class="nav-link" href="emprendedores.php">Emprendedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Mapa</a>
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
                            <a  class="nav-link" href="participacion.php">Participacion</a>
                        </li>

                </div>
            </div>






            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="https://i.pinimg.com/736x/9b/be/ae/9bbeae5d270674a4a57bbd942e3570f5.jpg"
                            class="d-block w-100" style="height: 600px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>LANAS Y OVILLOS</h5>
                            <p>hace tejidos variados</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://puntacana.shopping/upload/iblock/3cb/3cbee9f2db16ca9d9da566c602971938.jpg"
                            class="d-block w-100" style="height: 600px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>JOYAS PACHAMAMICAS</h5>
                            <p>joyas artesanales</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://d1ih8jugeo2m5m.cloudfront.net/2022/09/nombres-para-tiendas-de-ropa-1200x685.jpg"
                            class="d-block w-100" style="height: 600px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>EXPORROPA</h5>
                            <p>venta de ropa exportada</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://i0.wp.com/www.valdiloche.cl/wp-content/uploads/2022/11/AWG2406-3.jpg?fit=1200%2C722&ssl=1"
                            class="d-block w-100" style="height: 600px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>DULCE AMOR</h5>
                            <p>dulces artesanales</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="https://img.asmedia.epimg.net/resizer/4QW1SFBjqwtL2s0JQbFHTaKslK4=/1472x1104/cloudfront-eu-central-1.images.arcpublishing.com/diarioas/BCL4Q6J5HJOHZODM5QSPPXKZZE.jpg"
                            class="d-block w-100" style="height: 600px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>ENTRETE AMIGOS</h5>
                            <p>juegos para jovenes </p>
                        </div>
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="d-grid gap-2 d-sm-flex justify-content">

            </div>
        </div>
        <br>
        <br>
         <div class="container d-flex flex-column justify-content-center align-items-center">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    <div class="col">
                        <span class="mb-3 text-body-secondary">Seguridad Ciudadana: +56 9 4569 2347</span>
                    </div>

                    <div class="col">
                        <span class="mb-3 text-body-secondary">Mesa central: 800 816 00</span>
                    </div>

                    <div class="col">
                        <span class="mb-3 text-body-secondary">Direccion: Ejercito 1030. Concepcion, Chile</span>
                    </div>

                    <div class="col">
                        <span class="mb-3 text-body-secondary">Emergencia: *4142</span>
                    </div>

                    <div class="col">
                        <span class="mb-3 text-body-secondary">Nexo municipal: +56 41 298 7672</span>
                    </div>

                    <div class="col">
                        <span class="mb-3 text-body-secondary">Alumbrado público: +56 41 239 4723</span>
                    </div>
                </div>

            </div>
    </div>
   

    <script src="desactivar_link.js"></script>