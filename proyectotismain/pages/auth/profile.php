<?php
include("middleware/auth.php");
include("database/connection.php");

if (isset($_SESSION['email'])) {
    $user_rut = $_SESSION['email'];
} else {
    // El usuario no está autenticado, redirigir o mostrar un mensaje de error.
    header("Location: index.php?p=auth/login");
    exit();
}

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connection, $query);

if ($user = mysqli_fetch_assoc($result)) {
    $nombre = $user["nombre"];
    $apellido = $user["apellido"];
    $password = $user["password"];
    $rut = $user["rut"];
    $email = $user["email"];

    // Obtener eventos que sigue el usuario
    $query_eventos_seguidos = "SELECT idEvento, titulo, descripcion
                           FROM eventos
                           INNER JOIN seguimientos_eventos ON eventos.idEvento = seguimientos_eventos.id_evento
                           WHERE seguimientos_eventos.email = '$email'";

    $result_eventos_seguidos = mysqli_query($connection, $query_eventos_seguidos);
} else {
    // No se pudo encontrar el perfil del usuario, redirigir o mostrar un mensaje de error.
    header("Location: index.php?p=auth/index");
    exit();
}
?>

<body>
    <div class="perfil-backg">
        <div class="container ">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-center">
                            <h4 class="text-center">Perfil de <?= $nombre ?> <?= $apellido ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Rut:</strong> <?= $rut ?></li>
                        <li class="list-group-item"><strong>Nombre:</strong> <?= $nombre ?></li>
                        <li class="list-group-item"><strong>Apellido:</strong> <?= $apellido ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?= $email ?></li>
                    </ul>


                    <a href="index.php?p=auth/actions/editeprofile&email=<?= $email ?>" class="btn btn-primary mt-3">Editar Perfil</a>
                </div>
            </div>
        </div>
    </div>
</body>
