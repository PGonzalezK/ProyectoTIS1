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

<main class="contenedor">
    <div class="container-fluid border-bottom border-top bg-body-tertiary">
        <div class=" p-5 rounded text-center">
            <h2 class="fw-normal">Gestión de Direcciones Municipales</h1>
        </div>
    </div>
 <main class="contenedor mt-5 m-5">
    <table class="table table-bordered text-center">
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
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dirmunicipal = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <th scope="row">
                        <?php echo $dirmunicipal['id']; ?>
                    </th>
                    <td>
                     <?php echo limitarPalabras($dirmunicipal['nombre'], 3); ?>
                    </td>
                    <td>
                     <?php echo limitarPalabras($dirmunicipal['descripcion'], 3); ?>
                    </td>
                    <td>
                    <?php echo limitarPalabras($dirmunicipal['director'], 4); ?>
                    </td>
                    <td>
                        <?php echo $dirmunicipal['telefono']; ?>
                    </td>
                    <td>
                        <?php echo $dirmunicipal['email']; ?>
                    </td>
                    <td>
                        <?php echo $dirmunicipal['direccion']; ?>
                    </td>
                    <td>
                     <?php echo limitarPalabras($dirmunicipal['funciones'], 4); ?>
                    </td>
                    <td>
                        <a class="p-2 m-1 btn btn-outline-warning"
                            href="index.php?p=admin/direccionesMunicipales/actions/update&id=<?php echo $dirmunicipal['id']; ?>"
                            role="button">Editar</a>
                        <a class="p-2 m-1 btn btn-outline-danger"
                            href="index.php?p=admin/direccionesMunicipales/actions/delete&id=<?php echo $dirmunicipal['id']; ?>"
                            role="button">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </main>
    <a class="p-2 ms-5 btn btn-outline-success" href="index.php?p=admin/direccionesMunicipales/actions/create" role="button">Crear
        Nueva Dirección Municipal</a>

</main>

<?php
mysqli_close($connection);
?>

<?php function limitarPalabras($texto, $limite) {
    $palabras = explode(' ', $texto);
    $resultado = implode(' ', array_slice($palabras, 0, $limite));
    
    if (count($palabras) > $limite) {
        $resultado .= '...';
    }
    
    return $resultado;
}
?>