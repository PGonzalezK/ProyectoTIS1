<?php
    include("middleware/auth.php");
    include("database/connection.php");

    if ($_SESSION['id_rol'] !== '1') {
        // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }

    $query = "SELECT * FROM roles";
    $result = mysqli_query($connection, $query);
?>


 <div class="container">
        <h1>Roles Disponibles</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID de Rol</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['idRol']; ?></td>
                        <td><?php echo $row['nombreRol']; ?></td>
                        <td>
                            <a href="index.php?p=admin/roles/edit&id_rol=<?php echo $row['idRol']; ?>">Editar</a>
                            <a href="index.php?p=admin/roles/action/delete&id_rol=<?php echo $row['idRol']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php?p=admin/roles/create">Crear un Nuevo Rol</a>
    </div>

