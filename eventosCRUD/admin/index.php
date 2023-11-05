<?php 
    require '../includes/funciones.php';
    $auth = estaAutentificado();

    if(!$auth){
        header('Location:../index.php');
    }

    //conecta a la bd
    require '../includes/config/database.php';
    $db = conectarDB();
    //escribir el query
    $query = "SELECT * FROM eventos";
    //consultar la bd
    $resultadoConsulta = mysqli_query($db,$query);

    //mensaje condicional(?)
    $resultado = $_GET['resultado'] ?? null;
    //incluye los templates

    incluirTemplate('header');
?>


    <main class = "contenedor">
        <h1>Administracion Eventos</h1>
        <?php if (intval($resultado)===1):?>
            <div class="p-3 mb-2 bg-success text-white">Evento creado exitosamente</div>
            <?php elseif (intval($resultado)===2):?>
            <div class="p-3 mb-2 bg-success text-white">Evento actualizado exitosamente</div>
        <?php endif;?>
        <a class=" p-2 m-1 btn btn-primary" href="../admin/eventos/crear.php" role="button">Crear nuevo Evento</a>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Dirección</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de Creación</th>
                <th scope="col">Periodista</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody> <!--. Mostrar los resultados .-->
                <?php while($evento = mysqli_fetch_assoc($resultadoConsulta)): ?>

                <tr>
                <th scope="row"><?php echo $evento['idEvento'];?></th>
                <td><?php echo $evento['titulo'];?></td>
                <td><?php echo $evento['direccion'];?></td>
                <td> <img src="../imagenes/<?php echo $evento['imagen'];?>" class="imagen-tabla" alt=""></td>
                <td><?php echo $evento['descripcion'];?> </td>
                <td><?php echo $evento['creado'];?></td>
                <td><?php 
                        $idPeriodista = $evento['idPeriodista'];
                        $queryPeriodista = "SELECT nombre, apellido FROM periodistas WHERE idPeriodista = $idPeriodista";
                        $resultadoPeriodista = mysqli_query($db, $queryPeriodista);
                        $periodista = mysqli_fetch_assoc($resultadoPeriodista);
                        echo $periodista['nombre'] . " " . $periodista['apellido'];
                    ?></td>
                <td>
                    <a class=" p-2 m-1 btn btn-primary" href="../admin/eventos/actualizar.php?id=<?php echo $evento['idEvento']; ?>" role="button">Editar</a>
                    <a class="p-2 m-1 btn btn-danger" href="../admin/eventos/eliminar.php?id=<?php echo $evento['idEvento']; ?>" role="button">Eliminar</a>
                </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </main>
        
    <?php
        mysqli_close($db);
        incluirTemplate('footer');
    ?>
