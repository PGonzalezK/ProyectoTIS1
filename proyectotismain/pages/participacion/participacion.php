<div class="container text-center">
    <div class="row">
        <div class="col">

        </div>

       
    </div>
    <br>
    <br>
    <br>
    <br>
 <div class="participacionbackg">
    <form class="was-validated" method="POST" action="index.php?p=participacion\action\guardar_participacion">
        <div class="mb-3">
            <label class="input-group-text" for="inputGroupSelect01">TIPO CONTRIBUCIÓN</label>
            <select class="form-select" name="tipo_contribucion" required aria-label="select example">
                <option selected>Elija opción.</option>
                <option value="denuncia">DENUNCIA</option>
                <option value="felicitacion">FELICITACION</option>
                <option value="sugerencia">SUGERENCIA</option>
            </select>
            <div class="invalid-feedback">POR FAVOR ELIJA UNA OPCIÓN.</div>
        </div>
        <div class="mb-3">
            <label class="input-group-text" for="inputGroupSelect01">DEPARTAMENTO</label>
            <select class="form-select" name="departamento" required aria-label="select example">
                <option selected>Elija departamento.</option>
                <option value="paradero">PARADERO</option>
                <option value="parque">PARQUE</option>
                <option value="vial">VIAL</option>
                <option value="alumbrado">ALUMBRADO</option>
            </select>
            <div class="invalid-feedback">POR FAVOR ELIJA UNA OPCIÓN.</div>
        </div>
        <div class="mb-3">
            <label class="input-group-text" for="inputGroupSelect01">DESCRIPCIÓN</label>
            <input type="text" class="form-control" name="descripcion" placeholder="escriba una breve descripcion"
                required></input>
            <div class="invalid-feedback">
                REALICE SU MENSAJE.
            </div>
        </div>

        <!-- Agrega el campo "otro_dpto_text" aquí -->
        <div class="form-floating">
            <input type="text" class="form-control" name="otro_dpto_text" placeholder="Leave a comment here"
                style="height: 100px"></input>
            <label for="floatingTextarea2">Si eligió la opción "Otro Departamento", por favor indique departamento que
                pertenece.</label>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2">
                <label class="form-check-label" for="invalidCheck2">Mandar Anónimamente</label>
            </div>
        </div>
        <div class="col-12">
            <input class="btn btn-primary" value="enviar" type="submit"></input>
        </div>
    </form>
    </div>
    </div>

    
    <script src="desactivar_link.js"></script>