<?php
    include("middleware/auth.php");
    include("database/connection.php");

    if ($_SESSION['id_rol'] !== '1') {
        // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }

    $query = "SELECT * FROM emprendedores";
    $resultado = mysqli_query($connection, $query);
?>

<main class="contenedor">
    <div class="container-fluid border-bottom border-top bg-body-tertiary">
        <div class=" p-5 rounded text-center">
            <h2 class="fw-normal">Gestión de Emprendedores</h2>
        </div>
    </div>

    <main class="contenedor mt-5 m-5">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Año creación</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Aprobado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['ano_creacion']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><img src="pages/admin/emprendedores/imagenes/<?php echo $row['foto']; ?>" class="imagen-tabla" alt="" width="360px" height="360px"></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['aprobado']; ?></td>
                        <td>
                            <a href="index.php?p=admin/emprendedores/actions/aprobado&id=<?php echo $row['id']; ?>" class="btn btn-success">Aprobar</a>
                            <a href="index.php?p=admin/emprendedores/actions/delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</main>

<?php
    mysqli_close($connection);
?>
