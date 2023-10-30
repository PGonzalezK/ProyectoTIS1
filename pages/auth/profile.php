<?php
include("middleware/auth.php");
include("database/connection.php");

if (isset($_SESSION['rut'])) {
    $user_rut = $_SESSION['rut'];
} else {
    // El usuario no está autenticado, redirigir o mostrar un mensaje de error.
    header("Location: index.php?p=auth/login");
    exit();
}

$query = "SELECT * FROM users WHERE rut = '$user_rut'";
$result = mysqli_query($connection, $query);

if ($user = mysqli_fetch_assoc($result)) {
    $nombre = $user["nombre"];
    $apellido = $user["apellido"];
    $password = $user["password"];
    $email = $user["email"];
    $rut = $user["rut"];
} else {
    // No se pudo encontrar el perfil del usuario, redirigir o mostrar un mensaje de error.
    header("Location: index.php?p=auth/index");
    exit();
}
?>


<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">
                    <h4>Perfil de <?= $nombre ?> <?= $apellido ?></h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Rut:</strong> <?= $rut ?></li>
                <li class="list-group-item"><strong>Nombre:</strong> <?= $nombre ?></li>
                <li class="list-group-item"><strong>Apellido:</strong> <?= $apellido ?></li>
                <li class="list-group-item"><strong>Contraseña:</strong> <?= $password ?></li>
                <li class="list-group-item"><strong>Email:</strong> <?= $email ?></li>
            </ul>
            <a href="index.php?p=auth/actions/editeprofile&rut=<?= $rut ?>" class="btn btn-primary mt-3">Editar Perfil</a>
        </div>
    </div>
</div>

