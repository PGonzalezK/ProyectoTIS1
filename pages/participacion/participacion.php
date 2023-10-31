<div class="container text-center">
    <div class="row">
        <div class="col">

        </div>

        <div class="col-12">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=home">Inicio</a>
                </li>
                <li class="nav-item">
                    <a id="emprendedores-link" class="nav-link"
                        href="index.php?p=emprendedores/emprendedores">Emprendedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=mapa\mapa">Mapa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false" value="dd">Actualidad</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?p=actualidad/noticias/noticias">Noticias</a></li>
                        <li><a class="dropdown-item" href="index.php?p=actualidad/eventos/eventos">Eventos</a></li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Nexo Municipal</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?p=nexo-municipal/misionyvision/misionvision">Mision
                                y Vision</a></li>
                        <li><a class="dropdown-item" href="index.php?p=nexo-municipal/alcalde/alcalde">Palabras del
                                alcalde</a></li>
                        <li><a class="dropdown-item"
                                href="index.php?p=nexo-municipal/direccionesmunicipales/direcciones">Direcciones
                                Municipales</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a id="participacion-link" class="nav-link"
                        href="index.php?p=participacion\participacion">Participacion</a>
                </li>

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
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
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">Mandar Anónimamente</label>
            </div>
        </div>
        <div class="col-12">
            <input class="btn btn-primary" value="enviar" type="submit"></input>
        </div>
    </form>

    </div>
    <script src="desactivar_link.js"></script>