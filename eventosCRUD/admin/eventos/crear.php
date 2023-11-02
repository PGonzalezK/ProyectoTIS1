<?php 
    require '../../includes/config/database.php';
    $db = conectarDB();
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class = "contenedor">
        <h1>Creacion de evento:</h1>

        <div class="card">
        <form action="../eventos/crear.php" method="POST">
            <div class="card-body">
                <div class="row">
                
                    <div class="col-md-12 mb-3">
                        <label for="titulo" class="form-label">Titulo del Evento</label>
                        <input type="text" class="form-control" id="name" name="titulo" placeholder="Escribir titulo" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="direccion" class="form-label">Direccion del Evento</label>
                        <input type="text" class="form-control" id="name" name="direccion" placeholder="Barros Arana 1068, 4070053 Concepción, Bío Bío" required>

                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="image" name = "image" accept="image/png,image/jpeg">
                    </div>

                    <div class="mb-3">
                        <label for="descripcionEvento" class="form-label">Descripcion del Evento</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcionEvento" rows="4"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="nombrePeriodista" class="form-label">Nombre Periodista</label>
                        <select class="form-control" id="origin" name="nombrePeriodista">
                            <option value="Periodista1">Pablo</option>
                            <option value="Periodista2">Pablo 2 </option>
                            <option value="Periodista3">Javiera</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <a class="btn btn-primary" href="../index.php" role="button">Volver</a>
            
        
        </form>
    </div>

    </main>

    <?php
        incluirTemplate('footer');
    ?>