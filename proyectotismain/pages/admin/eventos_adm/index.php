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
        <div class="container-fluid border-bottom border-top bg-body-tertiary">
            <div class="p-5 rounded text-center">
                <h2 class="fw-normal">Gestión de Eventos</h2>
            </div>
        </div>

        <?php if (intval($resultado) === 1) : ?>
            <div class="mensaje-exito">Evento creado exitosamente</div>
        <?php elseif (intval($resultado) === 2) : ?>
            <div class="mensaje-exito">Evento actualizado exitosamente</div>
        <?php elseif (intval($resultado) === 3) : ?>
            <div class="mensaje-exito">Evento eliminado exitosamente</div>
        <?php endif; ?>

        <main class="contenedor mt-5 m-5">
            <table class="table table-bordered text-center">
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

                <?php while ($evento = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                        <tr>
                            <th scope="row"><?php echo $evento['idEvento']; ?></th>
                            <td><?php echo limitarPalabras($evento['titulo'], 4); ?></td>   
                    <td><?php echo $evento['direccion'];?></td>
                    <td><img src="pages/admin/eventos_adm/imagenes/<?php echo $evento['imagen'];?>" class="imagen-tabla" alt="" width="90" height="50"></td>
                    <td><?php echo limitarPalabras($evento['descripcion'], 4); ?></td>
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
                        <a class="p-2 m-1 btn btn-outline-warning" href="index.php?p=admin/eventos_adm/actions/edit&id=<?php echo $evento['idEvento']; ?>" role="button">Editar</a>
                        <a class="p-2 m-1 btn btn-outline-danger" href="javascript:void(0);" onclick="confirmarEliminar(<?php echo $evento['idEvento']; ?>)" role="button">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
    </main>
    <a class="p-2 ms-5 btn btn-outline-success crear-evento-btn" href="index.php?p=admin/eventos_adm/actions/create" role="button">Crear nuevo Evento</a>

</main>

<?php
    mysqli_close($connection);
?>

<script>
    function confirmarEliminar(idEvento) {
        var confirmacion = confirm("¿Estás seguro que deseas eliminar este evento?");
        if (confirmacion) {
            window.location.href = "index.php?p=admin/eventos_adm/actions/delete&id=" + idEvento;
        }
    }
</script>

<?php function limitarPalabras($texto, $limite) {
    $palabras = explode(' ', $texto);
    $resultado = implode(' ', array_slice($palabras, 0, $limite));
    
    if (count($palabras) > $limite) {
        $resultado .= '...';
    }
    
    return $resultado;
}
?>