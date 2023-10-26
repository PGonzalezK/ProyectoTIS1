<?php

include("..\database\conexion.php");
$consulta = "SELECT * FROM participacion";
$respuesta = mysqli_query($con, $consulta);

?>




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
        <?php require_once '..\includes\navbar_logeado.php'; ?>

        <div class="container text-center">
            <div class="row">
                <div class="col">

                </div>

                <div class="col-12">
                    <ul class="nav justify-content-center" style="background-color: #7e9dfb">
                        <li class="nav-item">
                            <a class="nav-link" href="..\index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="emprendedores.php">Emprendedores</a>
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
                        <a id="participacion-link" class="nav-link" href="participacion.php">Participacion</a>
                        </li>

                </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <form class="was-validated" method="POST" action="..\includes\guardar_participacion.php">
                <div class="mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">TIPO CONTRIBUCIÓN</label>
                    <select class="form-select" name="tipo_contribucion" aria-label="select example" required>
                        <option selected>Elija opcion.</option>
                        <option value="denuncia">DENUNCIA</option>
                        <option value="felicitacion">FELICITACION</option>
                        <option value="sugerencia">SUGERENCIA</option>
                    </select>
                    <div class="invalid-feedback">POR FAVOR ELIJA UNA OPCIÓN.</div>
                </div>
                <div class="mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">DEPARTAMENTO</label>
                    <select class="form-select" name="departamento" aria-label="select example" required>
                        <option selected>Elija departamento.</option>
                        <option value="dpto1">Departamento 1</option>
                        <option value="dpto2">Departamento 2</option>
                        <option value="dpto3">Departamento 3</option>
                        <option value="otro_dpto">Otro Departamento</option>
                    </select>
                    <div class="invalid-feedback">POR FAVOR ELIJA UNA OPCIÓN.</div>
                </div>
                <div class="mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">DESCRIPCIÓN</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="escriba una breve descripcion"
                        required></input>
                    <div class="invalid-feedback">
                        REALICE SU MENSAJE.
                    </div>
                </div>
                <div class="form-floating">
                <input type="text" name="otro_dpto_text" class="form-control" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Si eligió la opcion "Otro Departamento", por favor indique departamento que pertenece. </label>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2">
                    <label class="form-check-label" for="invalidCheck2">Mandar Anónimamente</label>
                </div>
            </div>
            <div class="col-12">
                <input class="btn btn-primary" value="Enviar" type="submit"></input>
            </div>
            </form>

