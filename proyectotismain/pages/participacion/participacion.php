<?php
require("database/connection.php");

// Comprueba si el usuario está logueado
$usuarioAutenticado = isset($_SESSION["email"]) && !empty($_SESSION["email"]);

$query = "SELECT id, asunto FROM asuntos";
$result = mysqli_query($connection, $query);

if ($result) {
    $departamentos = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$queryDepartamentos = "SELECT id, nombre FROM dirmunicipales";
$resultDepartamentos = mysqli_query($connection, $queryDepartamentos);

if ($resultDepartamentos) {
    $nombresDepartamentos = mysqli_fetch_all($resultDepartamentos, MYSQLI_ASSOC);
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_SESSION["email"];
    $contribucion = mysqli_real_escape_string($connection, $_POST['contribucion']);
    $asunto = mysqli_real_escape_string($connection, $_POST['asunto']);
    $departamento = mysqli_real_escape_string($connection, $_POST['departamento']);
    $descripcion = mysqli_real_escape_string($connection, $_POST['descripcion']);
    $otro = isset($_POST['otro']) ? mysqli_real_escape_string($connection, $_POST['otro']) : '';
    $fecha = date("Y-m-d H:i:s");

    $imagen = $_FILES['imagen'];

    $medida = 1000 * 1000;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada";
    }

    if (empty($errores)) {
        $carpetaImagenes = 'pages/participacion/imagenes/';
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        $query = "INSERT INTO participacion (email, tipo_contribucion, asunto_id, id_departamento, descripcion, otro_dpto_text, fecha, imagen) 
                  VALUES ('$email', '$contribucion', '$asunto', '$departamento', '$descripcion', '$otro', '$fecha', '$nombreImagen')";

        $resultado = mysqli_query($connection, $query);

        if ($resultado) {
            // Envía el correo electrónico
            $to = $email;
            $subject = "Confirmación de Participación";
            $message = "Gracias por tu participación. Hemos recibido la siguiente información:\n\n";
            $message .= "Tipo de contribución: $contribucion\n";
            $message .= "Departamento: $departamento\n";
            $message .= "Descripción: $descripcion\n";
            $message .= "Otro Departamento: $otro\n";
            $message .= "Fecha: $fecha\n";

            // Ajusta los encabezados según sea necesario
            $headers = "From: pruebaemailtis1@gmail.com"; // Reemplaza con tu dirección de correo

            // Envía el correo
            if (mail($to, $subject, $message, $headers)) {
                header("Location: index.php?p=participacion/participacion&mensajeExito=1");
            } else {
                echo "Error al enviar el correo electrónico.";
            }
        }
    }
}
?>

<style>
    .was-validated .form-control:valid,
    .was-validated .form-select:valid {
        border-color: white;
        /* Cambia este color al que desees para los bordes normales */
    }

    .was-validated .form-control:invalid,
    .was-validated .form-select:invalid {
        border-color: white;
        /* Color rojo actual para los bordes de error */
    }
</style>

<div>
    <?php require('includes/users/navbar_users.php'); ?>
</div>
<div class="formulario">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="contact-form">
                    <form onsubmit="return validarFormulario()" method="POST" id="participacionForm" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="contribucion"><h4>Tipo Contribución:</h4></label>
                            <select id="contribucion" class="form-control" name="contribucion" required>
                                <option value="" disabled selected>Elija opción.</option>
                                <option value="denuncia">DENUNCIA</option>
                                <option value="sugerencia">SUGERENCIA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departamento"><h4>Departamento:</h4></label>
                            <select id="departamento" class="form-control" name="departamento" required>
                                <option value="" disabled selected>Elija departamento.</option>
                                <?php
                                // Verificar si hay departamentos disponibles
                                if (isset($nombresDepartamentos) && !empty($nombresDepartamentos)) {
                                    foreach ($nombresDepartamentos as $depto) {
                                        echo '<option value="' . $depto['id'] . '">' . $depto['nombre'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="asunto"><h4>Asunto:</h4></label>
                            <select id="asunto" class="form-control" name="asunto" required>
                                <option value="" disabled selected>Elija asunto.</option>
                                <?php
                                // Verificar si hay asuntos disponibles
                                if (isset($departamentos) && !empty($departamentos)) {
                                    foreach ($departamentos as $depto) {
                                        echo '<option value="' . $depto['id'] . '">' . $depto['asunto'] . '</option>';
                                    }
                                }
                                ?>
                                <option value="otro">Otro Asunto</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label"><h4>Imagen:</h4></label>
                            <input class="form-control" type="file" id="imagen" accept="image/png, image/jpeg"  name="imagen">
                        </div>
                        <div class="form-group">
                            <label for="descripcion"><h4>Descripción:</h4></label>
                            <textarea id="descripcion" class="form-control" rows="5" placeholder="Escriba breve descripción" name="descripcion" required></textarea>
                        </div>

                        <?php if (!$usuarioAutenticado): ?>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#iniciarSesionModal">Enviar Contribución</button>
                        <?php else: ?>
                            <button type="submit" class="btn">Enviar Contribución</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-info">
                    <h3>Envíanos tu contribución:</h3>
                    <p>
                        Porque queremos saber tu opinión respecto a nuestros servicios así como también
                        ayudarte en caso de alguna problemática cerca de ti.
                        ¡Escribe a nuestros diferentes departamentos dentro de la comuna y les haremos llegar tu contribución!
                    </p>
                    <br>
                    <p>¡Hagamos entre todos una mejor comunidad!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal para iniciar sesión -->
<div class="modal fade" id="iniciarSesionModal" tabindex="-1" aria-labelledby="iniciarSesionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="iniciarSesionModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Debe iniciar sesión para poder enviar su contribución.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para mostrar el popup
    function mostrarPopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "block";
    }

    // Función para cerrar el popup
    function cerrarPopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "none";
    }
        // Función para mostrar el modal de iniciar sesión
        function mostrarModalIniciarSesion() {
        $('#iniciarSesionModal').modal('show');
    }

    // Función para cerrar el modal de iniciar sesión
    function cerrarModalIniciarSesion() {
        $('#iniciarSesionModal').modal('hide');
    }
    
</script>



