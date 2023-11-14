<?php
require("database\connection.php");
// Comprueba si el usuario está logueado
// Comprueba si el usuario está logueado
$usuarioAutenticado = isset($_SESSION["email"]) && !empty($_SESSION["email"]);


$query = "SELECT id, nombre_departamento FROM departamento_participacion";
$result = mysqli_query($connection, $query);

// Verificar si la consulta fue exitosa
if ($result) {
    $departamentos = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>

<div class="container text-center">
    <div class="row">
        <div class="col">
        </div>
        <?php require('includes/users/navbar_users.php'); ?>
    </div>
</div>
<div class="participacionbackg">
    <div class="container justify-content-between align-items-center">
        <form class="was-validated" method="POST" action="index.php?p=participacion\action\guardar_participacion">
            <div class="mb-3">
                <label for="tipo_contribucion" class="form-label" style="color: white;">TIPO CONTRIBUCIÓN</label>
                <select class="form-select" id="tipo_contribucion" name="tipo_contribucion" required>
                    <option value="" disabled selected>Elija opción.</option>
                    <option value="denuncia">DENUNCIA</option>
                    <option value="felicitacion">FELICITACION</option>
                    <option value="sugerencia">SUGERENCIA</option>
                </select>
                <div class="invalid-feedback">Por favor elija una opción.</div>
            </div>
            <div class="mb-3">
    <label for="departamento" class="form-label" style="color: white;">DEPARTAMENTO</label>
    <select class="form-select" id="departamento" name="departamento" required>
        <option value="" disabled selected>Elija departamento.</option>
        <?php
        // Verificar si hay departamentos disponibles
        if (isset($departamentos) && !empty($departamentos)) {
            foreach ($departamentos as $departamento) {
                echo '<option value="' . $departamento['id'] . '">' . $departamento['nombre_departamento'] . '</option>';
            }
        }
        ?>
        <option value="otro">Otro Departamento</option>
    </select>
    <div class="invalid-feedback">Por favor elija una opción.</div>
</div>
            <div class="mb-3">
                <label for="descripcion" class="form-label" style="color: white;">DESCRIPCIÓN</label>
                <textarea class="form-control" id="descripcion" name="descripcion"
                    placeholder="Escriba una breve descripción" required></textarea>
                <div class="invalid-feedback">Realice su mensaje.</div>
            </div>
            <div class="mb-3" id="otro_dpto_text_div" style="display: none;">
                <label for="otro_dpto_text" class="form-label">Indique departamento que pertenece</label>
                <input type="text" class="form-control" id="otro_dpto_text" name="otro_dpto_text"
                    placeholder="Especifique el departamento">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="anonimo" name="anonimo">
                <label class="form-check-label" for="anonimo" style="color: white;">Mandar Anónimamente</label>
            </div>
            <?php if (!$usuarioAutenticado): ?>
                <div class="col-12">
                    <button type="button" onclick="mostrarModal()" class="btn btn-primary">Enviar</button>
                </div>
            <?php else: ?>
                <div class="col-12">
                    <input class="btn btn-primary" value="enviar" type="submit"></input>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>



<!-- modal-->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Debe iniciar sesión para enviar su participación, si no tiene cuenta puede registrarse aqui.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="index.php?p=auth/login" class="btn btn-primary">Iniciar Sesión</a>
                <a href="index.php?p=auth/register" class="btn btn-primary">Registrarse</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Función para mostrar el modal
    function mostrarModal() {
        $('#loginModal').modal('show');
    }
</script>