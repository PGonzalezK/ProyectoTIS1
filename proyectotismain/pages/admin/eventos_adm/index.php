<?php 
    include("middleware/auth.php");
    include("database/connection.php");

    if ($_SESSION['id_rol'] !=='1'){
        // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }
    
    $query = "SELECT * FROM eventos";
    $resultadoConsulta = mysqli_query($connection, $query);
    $resultado = $_GET['resultado'] ?? null;
?>

<main class="contenedor">
    <h1>Administracion Eventos</h1>
    <?php if (intval($resultado) === 1):?>
        <div class="p-3 mb-2 bg-success text-white">Evento creado exitosamente</div>
    <?php elseif (intval($resultado) === 2):?>
        <div class="p-3 mb-2 bg-success text-white">Evento actualizado exitosamente</div>
    <?php elseif (intval($resultado) === 3):?>
        <div class="p-3 mb-2 bg-success text-white">Evento eliminado exitosamente</div>
    <?php endif;?>

    <a class="p-2 m-1 btn btn-primary" href="index.php?p=admin/eventos_adm/actions/create" role="button">Crear nuevo Evento</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Dirección</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de Creación</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($evento = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <th scope="row"><?php echo $evento['idEvento'];?></th>
                    <td><?php echo $evento['titulo'];?></td>
                    <td><?php echo $evento['direccion'];?></td>
                    <td><img src="pages/admin/eventos_adm/imagenes/<?php echo $evento['imagen'];?>" class="imagen-tabla" alt="" width="200" height="150"></td>
                    <td><?php echo $evento['descripcion'];?> </td>
                    <td><?php echo $evento['creado'];?></td>
                    <td>
                        <?php 
                            $idEditor = $evento['id_editor'];
                            $queryEditor = "SELECT nombre, apellido FROM users WHERE id = $idEditor";
                            $resultadoEditor = mysqli_query($connection, $queryEditor);
                            $editor = mysqli_fetch_assoc($resultadoEditor);
                            echo $editor['nombre'] . " " . $editor['apellido'];
                        ?>
                    </td>
                    <td>
                        <a class="p-2 m-1 btn btn-primary" href="index.php?p=admin/eventos_adm/actions/edit&id=<?php echo $evento['idEvento']; ?>" role="button">Editar</a>
                        <a class="p-2 m-1 btn btn-danger" href="index.php?p=admin/eventos_adm/actions/delete&id=<?php echo $evento['idEvento']; ?>" role="button">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</main>

<?php
    mysqli_close($connection);
?>
