<?php 

    //conecta a la bd

    //escribir el query

    


    $resultado = $_GET['resultado'] ?? null;
    //incluye los templates
    require '../includes/funciones.php';
    incluirTemplate('header');
?>


    <main class = "contenedor">
        <h1>Administracion Eventos</h1>
        <?php if (intval($resultado)===1):?>
            <div class="p-3 mb-2 bg-success text-white">Evento creado exitosamente</div>
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
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Evento 1</td>
                <td>Lota</td>
                <td> <img src="../imagenes/cbcd5234964db99f3d049a5b95e497ac.jpg" class="imagen-tabla" alt=""></td>
                <td>descripcion bla bla bla </td>
                <td>10-10-10</td>
                <td>nombre Periodista</td>
                <td>
                <a class=" p-2 m-1 btn btn-primary" href="#" role="button">Editar</a>
                <a class=" p-2 m-1 btn btn-danger" href="#" role="button">Eliminar</a>
                </td>
                </tr>
            </tbody>
        </table>


    </main>

    <?php
        incluirTemplate('footer');
    ?>