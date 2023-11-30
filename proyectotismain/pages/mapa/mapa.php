<?php

include("database/connection.php");

if (isset($_GET['mensajeExito']) && $_GET['mensajeExito'] == 1) {
    echo '<div class="alert alert-success">Su Punto de mapa se envió con éxito. se enviara un correo cuando su punto este en el mapa.</div>';
    }


?>


<br>
<div class="mapabackg">
    <div class="container text-center">
    <iframe src="https://www.google.com/maps/d/u/6/embed?mid=1HNdeZ8Zz2TNvFvCIHi2CterD1DMcYOU&ehbc=2E312F" width="640" height="480"></iframe>
    </div>

    <div>
        <div class="container text-center">
            <h2>¿Quieres agregar un punto de referencia de tu emprendimiento?</h2>
            <h3>Rellena el siguiente formulario y cuando tu punto este activo se te enviara una notificacion mediante
                Email</h3>
        </div>
    </div>


    <div class="container text-center">
        <form action="index.php?p=mapa/action/guardar_punto" method="post">
            <div class="mb-3">
                <label for="nombre_punto">Nombre del Punto:</label>
                <input type="text" name="nombre_punto" required>
            </div>

            <div class="mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="lat">Latitud:</label>
                <input type="text" name="lat" required>
            </div>

            <div class="mb-3">
                <label for="lng">Longitud:</label>
                <input type="text" name="lng" required>
            </div>

            <button type="submit">Enviar</button>
        </form>
    </div>