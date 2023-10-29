<?php
    include("database/connection.php");  // Incluye la conexión
    include("middleware/auth.php");  // Comprueba si el usuario está logueado, sino lo redirige al login

    $query = "SELECT * FROM ";
    $result = mysqli_query($connection, $query);
?>

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class=" p-5 rounded text-center">
        <h2 class="fw-normal">Listado Marcas</h1>
    </div>
</div>

<main class="container mt-5">


    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">

                </div>
                <div>
                    <a class="btn btn-sm btn-primary" href="index.php?p=brands/create" role="button">Agregar nuevo</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive ">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <th scope="row"><?= $fila['id'] ?></th>
                            <td><?= $fila['nombre'] ?></td>
                            <td><?= $fila['origen'] ?></td>
                            <td><?= $fila['logo'] ?></td>
                            <td>
                                <a href="index.php?p=admin/brands/edit&id=<?= $fila['id'] ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                                <a href="pages/admin/brands/actions/delete.php?id=<?= $fila['id'] ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                            </td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>