<?php
    include("middleware/auth.php");
    include("database/connection.php");

    if ($_SESSION['id_rol'] !== '1') {
        // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
        header("Location: index.php");
        exit();
    }

    $query = "SELECT * FROM participacion";
    $result = mysqli_query($connection, $query);
?>


 <div class="container">
        <h1>Participaciones enviadas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Tipo de contribucion</th>
                    <th>Departamento</th>
                    <th>Descripcion</th>
                    <th>Texto aparte</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['tipo_contribucion']; ?></td>
                        <td><?php echo $row['departamento']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['otro_dpto_text']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td>

                            <a href="index.php?p=admin/roles/action/delete&id_rol=<?php echo $row['id']; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

