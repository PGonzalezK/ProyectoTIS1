<?php 
    include("middleware/auth.php");
    include("database/connection.php");

    // Verificar si el usuario tiene permisos (id_rol igual a 1 o 6)
    if ($_SESSION['id_rol'] !== '1' && $_SESSION['id_rol'] !== '6') {
        // El usuario no tiene permisos para acceder a esta página
        if ($_SESSION['id_rol'] === '3') {
            // Si el id_rol es 3, mostrar un mensaje especial
            echo "<h2>No tienes permiso para ver esta página.</h2>";
        } else {
            // Redirigir a otra página o mostrar un mensaje de error estándar
            header("Location: index.php");
            exit();
        }
    }
    
    $query = "SELECT * FROM noticias";
    $resultadoConsulta = mysqli_query($connection, $query);
    $resultado = $_GET['resultado'] ?? null;
?>

<main class="contenedor">
<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">Gestión de Noticias</h1>
    </div>
</div>
    <?php if (intval($resultado) === 1):?>
        <div class="p-3 mb-2 bg-success text-white">Noticia creada exitosamente</div>
    <?php elseif (intval($resultado) === 2):?>
        <div class="p-3 mb-2 bg-success text-white">Noticia actualizada exitosamente</div>
    <?php elseif (intval($resultado) === 3):?>
        <div class="p-3 mb-2 bg-success text-white">Noticia eliminada exitosamente</div>
    <?php endif;?>


    <main class="contenedor mt-5 m-5">
    <table class="table table-bordered text-center">
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
                    <td><?php echo limitarPalabras($noticia['titulo'], 4); ?></td>
                    <td>
                        <?php 
                            $idEditor = $noticia['id_editor'];
                            $queryEditor = "SELECT nombre, apellido FROM users WHERE id = $idEditor";
                            $resultadoEditor = mysqli_query($connection, $queryEditor);
                            $editor = mysqli_fetch_assoc($resultadoEditor);
                            echo $editor['nombre'] . " " . $editor['apellido'];
                        ?>
                    </td>
                    <td><img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen'];?>" class="imagen-tabla" alt="" width="90" height="50"></td>
                    <td><?php echo limitarPalabras($noticia['descripcion'], 4); ?></td>
                    <td><?php echo $noticia['creado'];?></td>
                    <td>
                        <a class="p-2 m-1 btn btn-outline-warning" href="index.php?p=admin/noticias_adm/actions/update&id=<?php echo $noticia['idNoticia']; ?>" role="button">Editar</a>
                        <a class="p-2 m-1 btn btn-outline-danger" href="javascript:void(0);" onclick="confirmarEliminar(<?php echo $noticia['idNoticia']; ?>)" role="button">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</main>

    <a class="p-2 ms-5 btn btn-outline-success" href="index.php?p=admin/noticias_adm/actions/create" role="button">Crear nueva Noticia</a>
   
</main>
<?php
    mysqli_close($connection);
?>

<script>
    function confirmarEliminar(idEvento) {
        var confirmacion = confirm("¿Estás seguro que deseas eliminar esta Noticia?");
        if (confirmacion) {
            window.location.href = "index.php?p=admin/noticias_adm/actions/delete&id=" + idEvento;
        }
    }
</script>
<?php
// Función para limitar palabras en PHP con "..."
function limitarPalabras($texto, $limite) {
    $palabras = explode(' ', $texto);
    $resultado = implode(' ', array_slice($palabras, 0, $limite));
    
    if (count($palabras) > $limite) {
        $resultado .= '...';
    }
    
    return $resultado;
}
?>