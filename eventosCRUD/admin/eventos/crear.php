<?php 
    require '../../includes/config/database.php';
    $db = conectarDB();


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
    }

    $titulo = $_POST['titulo'];
    $direccion =$_POST['direccion'];
    $descripcion =$_POST['descripcion'];
    $idPeriodista = $_POST['idPeriodista'];

    //Insertar Variables
    $query = "INSERT INTO eventos (titulo , direccion, descripcion, idPeriodista) VALUES ('$titulo','$direccion','$descripcion', '$idPeriodista')";
    //resultados
    $resultado = mysqli_query($db,$query);

    if($resultado){
        echo "insertado correctamente";
    }

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
                        <label class="input-group-text" for="descripcion">DESCRIPCIÓN</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="escriba una breve descripcion"
                            required></input>
                        <div class="invalid-feedback">
                           ESCRIBA BREVE DESCRIPCION DEL EVENTO
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="idPeriodista" class="form-label">Nombre Periodista</label>
                        <select class="form-control" id="origin" name ="idPeriodista">
                            <option value="1">Pablo</option>
                            <option value="2">Pablo 2 </option>
                            <option value="3">Javiera</option>
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