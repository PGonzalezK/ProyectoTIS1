<?php
include("middleware/auth.php");
include("database/connection.php");

// Consulta para obtener la Misión y la Visión desde la base de datos
$query = "SELECT * FROM misionvision";
$result = mysqli_query($connection, $query);

$mision = '';
$vision = '';

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['tipo'] === 'mision') {
        $mision = $row['contenido'];
    } elseif ($row['tipo'] === 'vision') {
        $vision = $row['contenido'];
    }
}
?>

<div class="container text-center">
    <div class="mision-backg">
        <br><br>
        <h2 class="card-header text-left"><b class="titulo">Misión y Visión</b></h2>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <h2 class="card-header text-left"><b>Misión</b></h2>
                    <div class="card-body">
                        <h6><?php echo $mision; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <h2 class="card-header text-left"><b>Visión</b></h2>
                    <div class="card-body">
                        <h6><?php echo $vision; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
