<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    header("Location: index.php");
    exit();
}


$query = "SELECT * FROM mapa";


$result = mysqli_query($connection, $query);
?>


<main class="contenedor">
    <div class="container-fluid border-bottom border-top bg-body-tertiary">
        <div class="p-5 rounded text-center">
            <h1 class="fw-normal">Participaciones enviadas</h1>
        </div>
    </div>

    <main class="contenedor mt-5 m-5">

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Nombre del punto</th>
                    <th>Descripción</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th scope="col">Aprobado</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['id_mapa']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['nombre_punto']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['lat']; ?></td>
                    <td><?php echo $row['lng']; ?></td>
                    <td><?php echo $row['aprobado']; ?></td>
                    
                    <td>
                        <a href="index.php?p=admin/mapa/actions/aprobado&id_mapa=<?php echo $row['id_mapa']; ?>" class="btn btn-success">Aprobar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</main>
