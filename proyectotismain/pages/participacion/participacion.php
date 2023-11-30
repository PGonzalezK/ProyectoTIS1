<?php

require("database\connection.php");

// Comprueba si el usuario está logueado
$usuarioAutenticado = isset($_SESSION["email"]) && !empty($_SESSION["email"]);

$query = "SELECT id, asunto FROM asuntos";
$result = mysqli_query($connection, $query);

// Verificar si la consulta fue exitosa
if ($result) {
    $departamentos = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


if (isset($_GET['mensajeExito']) && $_GET['mensajeExito'] == 1) {
    echo '<div class="alert alert-success">Su participación se envió con éxito. Recibirá un feedback por correo electrónico.</div>';
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
                    <form>
                        <div class="form-group">
                            <label for="contribucionType"><h4>Tipo Contribución:</h4></label>
                            <select id="contribucionType" class="form-control">
                                <option value="" disabled selected>Elija opción.</option>
                                <option value="denuncia">DENUNCIA</option>
                                <option value="felicitacion">FELICITACION</option>
                                <option value="sugerencia">SUGERENCIA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departamento"><h4>Departamento:</h4></label>
                            <select id="departamento" class="form-control">
                                <option value="" disabled selected>Elija departamento.</option>
                                <?php
                                // Verificar si hay departamentos disponibles
                                if (isset($departamentos) && !empty($departamentos)) {
                                    foreach ($departamentos as $departamento) {
                                        echo '<option value="' . $departamento['id'] . '">' . $departamento['id_departamento'] . '</option>';
                                    }
                                }
                                ?>
                                <option value="otro">Otro Departamento</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departamento"><h4>Asunto:</h4></label>
                            <select id="departamento" class="form-control">
                                <option value="" disabled selected>Elija asunto.</option>
                                <?php
                                // Verificar si hay departamentos disponibles
                                if (isset($departamentos) && !empty($departamentos)) {
                                    foreach ($departamentos as $departamento) {
                                        echo '<option value="' . $departamento['id'] . '">' . $departamento['asunto'] . '</option>';
                                    }
                                }
                                ?>
                                <option value="otro">Otro Departamento</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descripcion"><h4>Descripción:</h4></label>
                            <textarea id="descripcion" class="form-control" rows="5" placeholder="Escriba breve descripción"></textarea>
                        </div>
                        <?php if (!$usuarioAutenticado): ?>
                            <button type="button" onclick="mostrarIniciarSesionModal()" class="btn">Enviar Contribución</button>
                        <?php else: ?>
                            <button type="button" onclick="mostrarFeedbackModal()" class="btn">Enviar Contribución</button>
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
                       ¡Escribe a Nuestros diferentes departamentos dentro de la comuna y les haremos llegar tu contribución!
                    </p>
                    <br>
                    <p>¡Hagamos entre todos una mejor comunidad!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para feedback participacion -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Participación Enviada</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Su participación ha sido enviada. Se le enviará un correo con el feedback correspondiente.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
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
// Función para mostrar el modal de feedback
function mostrarFeedbackModal() {
    $('#feedbackModal').modal('show');
}

// Función para mostrar el modal de iniciar sesión
function mostrarIniciarSesionModal() {
    $('#iniciarSesionModal').modal('show');
}
</script>