<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    header("Location: index.php");
    exit();
}

$filtroDepartamento = isset($_GET['filtroDepartamentoNuevo']) ? $_GET['filtroDepartamentoNuevo'] : null;

$query = "SELECT * FROM participacion";

if ($filtroDepartamento) {
    $query .= " WHERE departamento = '$filtroDepartamento'";
}

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
                    <th>Tipo de contribución</th>
                    <th>Departamento</th>
                    <th>Descripción</th>
                    <th>Texto aparte</th>
                    <th>Fecha</th>
                    <th>Estado de Revisión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['tipo_contribucion']; ?></td>
                    <td><?php echo $row['departamento']; ?></td>
                    <td>
                        <?php
                            $descripcion_corta = substr($row['descripcion'], 0, 50);
                            $mostrar_mas = strlen($row['descripcion']) > 50;
                        ?>
                        <div class="descripcion-container">
                            <?php echo $descripcion_corta; ?>
                            <?php if ($mostrar_mas) { ?>
                            <span class="descripcion-completa" style="display: none;">
                                <?php echo $row['descripcion']; ?>
                            </span>
                            <span class="puntos-suspensivos">...</span>
                            <?php } ?>
                        </div>
                    </td>
                    <td><?php echo $row['otro_dpto_text']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['estado_revision']; ?></td>
                    <td>
                        <button class="btn btn-link mostrar-mas-btn-acciones">Mostrar más</button>
                        <select class="form-select" aria-label="Estado de Revisión">
                            <option value="Sin leer"
                                <?php echo ($row['estado_revision'] === 'Sin leer') ? 'selected' : ''; ?>>Sin leer
                            </option>
                            <option value="En revisión"
                                <?php echo ($row['estado_revision'] === 'En revisión') ? 'selected' : ''; ?>>En revisión
                            </option>
                            <option value="En proceso"
                                <?php echo ($row['estado_revision'] === 'En proceso') ? 'selected' : ''; ?>>En proceso
                            </option>
                            <option value="Ejecutando procedimientos"
                                <?php echo ($row['estado_revision'] === 'Ejecutando procedimientos') ? 'selected' : ''; ?>>
                                Ejecutando procedimientos</option>
                            <option value="Terminado"
                                <?php echo ($row['estado_revision'] === 'Terminado') ? 'selected' : ''; ?>>Terminado
                            </option>
                        </select>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</main>



<main class="contenedor mt-5 m-5">

    <div class="table-responsive" style="display: none;" id="tablaDetalles">
        <h1>Detalles de Participación</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Tipo de contribucion</th>
                    <th>Departamento</th>
                    <th class="col-8">Descripcion</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody id="detallesBody">
            </tbody>
        </table>
    </div>
    <button class="btn btn-link cerrar-detalles-btn">Cerrar</button>

</main>