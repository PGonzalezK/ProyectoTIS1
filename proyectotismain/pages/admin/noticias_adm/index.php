<?php 
    include("middleware/auth.php");
    include("database/connection.php");

    if ($_SESSION['id_rol'] !=='1'){
        // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }
    
    $query = "SELECT * FROM noticias";
    $resultadoConsulta = mysqli_query($connection, $query);
    $resultado = $_GET['resultado'] ?? null;
?>

<main class="contenedor">
    <h1>Administracion de Noticias</h1>
    <?php if (intval($resultado) === 1):?>
        <div class="p-3 mb-2 bg-success text-white">Noticia creada exitosamente</div>
    <?php elseif (intval($resultado) === 2):?>
        <div class="p-3 mb-2 bg-success text-white">Noticia actualizada exitosamente</div>
    <?php elseif (intval($resultado) === 3):?>
        <div class="p-3 mb-2 bg-success text-white">Noticia eliminada exitosamente</div>
    <?php endif;?>

    <a class="p-2 m-1 btn btn-primary" href="index.php?p=admin/noticias_adm/actions/create" role="button">Crear nueva Noticia</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Colaborador</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de Creación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($noticia = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <th scope="row"><?php echo $noticia['idNoticia'];?></th>
                    <td><?php echo $noticia['titulo'];?></td>
                    <td>
                        <?php 
                            $idEditor = $noticia['id_editor'];
                            $queryEditor = "SELECT nombre, apellido FROM users WHERE id = $idEditor";
                            $resultadoEditor = mysqli_query($connection, $queryEditor);
                            $editor = mysqli_fetch_assoc($resultadoEditor);
                            echo $editor['nombre'] . " " . $editor['apellido'];
                        ?>
                    </td>
                    <td><img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen'];?>" class="imagen-tabla" alt="" width="200" height="150"></td>
                    <td><?php echo $noticia['descripcion'];?> </td>
                    <td><?php echo $noticia['creado'];?></td>
                    <td>
                        <a class="p-2 m-1 btn btn-primary" href="index.php?p=admin/noticias_adm/actions/update&id=<?php echo $noticia['idNoticia']; ?>" role="button">Editar</a>
                        <a class="p-2 m-1 btn btn-danger" href="index.php?p=admin/noticias_adm/actions/delete&id=<?php echo $noticia['idNoticia']; ?>" role="button">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</main>
<?php
    mysqli_close($connection);
?>