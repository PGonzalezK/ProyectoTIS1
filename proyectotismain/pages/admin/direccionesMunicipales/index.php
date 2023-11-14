<?php
    include("middleware/auth.php");
    include("database/connection.php");

    if ($_SESSION['id_rol'] !== '1') {
        // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }

    $query = "SELECT * FROM dirmunicipales";
    $resultadoConsulta = mysqli_query($connection, $query);
    $resultado = $_GET['resultado'] ?? null;
?>

<a class="p-2 m-1 btn btn-primary" href="index.php?p=admin/direccionesMunicipales/actions/create" role="button">Crear Nueva Dirección Municipal</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Director</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Email</th>
            <th scope="col">Dirección</th>
            <th scope="col">Funciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while($dirmunicipal = mysqli_fetch_assoc($resultadoConsulta)): ?>
            <tr>
                <th scope="row"><?php echo $dirmunicipal['id'];?></th>
                <td><?php echo $dirmunicipal['nombre'];?></td>
                <td><?php echo $dirmunicipal['descripcion'];?></td>
                <td><?php echo $dirmunicipal['director'];?></td>
                <td><?php echo $dirmunicipal['telefono'];?></td>
                <td><?php echo $dirmunicipal['email'];?> </td>
                <td><?php echo $dirmunicipal['direccion'];?></td>
                <td><?php echo $dirmunicipal['funciones'];?></td>
                <td>
                    <a class="p-2 m-1 btn btn-primary" href="index.php?p=admin/direccionesMunicipales/actions/update&id=<?php echo $dirmunicipal['id']; ?>" role="button">Editar</a>
                    <a class="p-2 m-1 btn btn-danger" href="index.php?p=admin/direccionesMunicipales/actions/delete&id=<?php echo $dirmunicipal['id']; ?>" role="button">Eliminar</a>
                </td>
            </tr>
        <?php endwhile;?>
    </tbody>
</table>
</main>

<?php
    mysqli_close($connection);
?>