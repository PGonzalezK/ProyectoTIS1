<?php
// Descomentar linea 3 si es que se quiere usar la autenticación para esta página
//session_start();
require("middleware\auth.php");
if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}
?>
<div class="text-center">
    <div class="centrado">
        <div class="px-4 py-5 text-center ">
            <img class="d-block mx-auto mb-4"
                src="pages\auth\images\logo-largo.png"
                alt="" width="400" height="100">
            <h1 class="display-5 fw-bold" style="color: black;">Bienvenido
                <?php echo $_SESSION['email'] ?? null ?>
            </h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4" style="color: black;"> este es tu portal de administrador donde puedes agregar ,
                    editar y eliminar dentro de
                    la plataforma</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="index.php?p=home" class="btn btn-primary">Ir a Inicio</a>
                    <?php

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>