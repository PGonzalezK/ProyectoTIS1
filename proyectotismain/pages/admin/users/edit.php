<?php
include("database/connection.php");
include("middleware/auth.php");

$rut = $_GET["rut"];

$query = "SELECT * FROM users WHERE rut = " . $rut . ";";
$result = mysqli_query($connection, $query);

/*Consulta para obtener roles*/ 

$consultaRol = "SELECT * FROM roles";
$resultadoRol = mysqli_query($connection,$consultaRol);


if ($user = mysqli_fetch_assoc($result)) {
    $nombre = $user["nombre"];
    $apellido = $user["apellido"];
    $email = $user["email"];
    $id_rol = $user["id_rol"];
    $rut = $user["rut"];
} else {
    header("Location: index.php?p=brands/index");
}

?>

<div class="container-fluid border-bottom border-top bg-body-tertiary">
    <div class="p-5 rounded text-center">
        <h2 class="fw-normal">Editor de usuario</h1>
    </div>
</div>

<main class="container mt-5">
    <div class="card">
        <form action="index.php?p=admin/users/actions/update" method="POST">
            <div class="card-body">
                <div class="row">
                    <input type="text" class="d-none" name="rut" value="<?php echo $rut ?>">

                    <div class="col-md-12 mb-3">
                        <label for="nombre" class="form-label">Nombre del usuario</label>
                        <input type="text" id="nombre" class="form-control" name="nombre" value="<?php echo $nombre ?>"
                            placeholder="nombre" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="apellido" class="form-label">Apellido del usuario</label>
                        <input type="text" id="apellido" class="form-control" name="apellido"
                            value="<?php echo $apellido ?>" placeholder="apellido" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="origin" class="form-label">Correo electronico</label>
                        <input type="email" id="email" class="form-control" name="email" value="<?php echo $email ?>"
                            required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="id_rol" class="form-label">Rol</label>
                        <select class="form-control" id="origin" name="id_rol">
                            <?php while($rol = mysqli_fetch_assoc($resultadoRol)): ?>
                                <option value="<?php echo $rol['idRol']; ?>" <?php if ($rol['idRol'] == $id_rol) echo 'selected'; ?>>
                                    <?php echo $rol['idRol'] . " " . $rol['nombreRol']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <!-- <div class="col-md-12 mb-3">
                        <label for="logo" class="form-label">Contraseña</label>
                        <input type="password" id="" class="form-control" name="password" value="">
                        <span class="text-muted">Complete este campo solo si desea cambiar la contraseña.</span>
                    </div> -->
                </div>
            </div>

            <div class="card-footer text-body-secondary text-end">
                <button type="submit" class="btn btn-primary">Guardar</button> <!-- Doble confirmacion -->
            </div>
        </form>
    </div>

</main>