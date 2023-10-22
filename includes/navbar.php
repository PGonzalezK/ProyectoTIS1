<!-- As a link -->
<nav class="navbar navbar-expand-lg bg-ligh" style="background-color: #e3f2fd">
    <div class="container-fluid">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <i class="fa-brands fa-instagram fa-2xl"></i>
                    <i class="fa-brands fa-facebook fa-2xl"></i>
                    <i class="fa-brands fa-x-twitter fa-2xl"></i>
                </div>
                <div class="col">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </form>
                </div>
                <div class="col">

                    <form class="d-flex" role="search">
                        <button type="button" class="btn btn-outline-success me-2" data-bs-toggle="modal"
                            data-bs-target="#IniciarSesion">
                            Iniciar Sesion
                        </button>
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                            data-bs-target="#Registrarse">
                            Registrarse
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="IniciarSesion" tabindex="-1" aria-labelledby="ModalIniciarsesion"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 " id="ModalIniciarsesion">Iniciar Sesion</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <form action="" method="post" name="login">
                                <input type="text" name="username" placeholder="Usuario" required />
                                <input type="password" name="password" placeholder="Contraseña" required />
                                <input name="submit" type="submit" value="Entrar" />
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="Registrarse" tabindex="-1" aria-labelledby="ModalRegistrarse" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalRegistrarse">Registrarse</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="registration" action="" method="post">
                            <input type="text" name="username" placeholder="Usuario" required />
                            <input type="email" name="email" placeholder="Correo" required />
                            <input type="password" name="password" placeholder="Contraseña" required />
                            <input type="submit" name="submit" value="Registrarse" />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</nav>




<!-- Bootstrap CSS y JS (asegúrate de incluir estas bibliotecas en tu archivo) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>