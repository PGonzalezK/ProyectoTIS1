<?php
include("middleware/auth.php");
include("database/connection.php");

if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

// Obtener datos para los gráficos

?>


<main class="contenedor">
        <div class="container-fluid border-bottom border-top bg-body-tertiary">
            <div class="p-5 rounded text-center">
                <h2 class="fw-normal">Gráficos</h2>
            </div>
        </div>

        <main class="contenedor mt-5 m-5">
            <div class="row">
                <div class="col-md-4">
                    <canvas id="denunciasChart" width="400" height="200"></canvas>
                </div>
                <div class="col-md-4">
                    <canvas id="felicitacionesChart" width="400" height="200"></canvas>
                </div>
                <div class="col-md-4">
                    <canvas id="sugerenciasChart" width="400" height="200"></canvas>
                </div>
            </div>
        </main>

        <main class="contenedor mt-5 m-5">
            <!-- Otras secciones de tu página si las hay -->
        </main>
    </main>

    <!-- Datos para los gráficos -->
    <script>
        var denunciasData = <?php echo $denunciasData; ?>;
        var felicitacionesData = <?php echo $felicitacionesData; ?>;
        var sugerenciasData = <?php echo $sugerenciasData; ?>;
    </script>

    <!-- Importar el archivo de JavaScript externo después de definir las variables -->
    <script src="graficos.js"></script>