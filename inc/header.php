<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">BRAYNER CAR</a>
            <button class="navbar-toggler shadow name" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="autos.php">CARROS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="servicios.php">INFORMACION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">CONTACTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="acercanos.php">ACERCA DE NOSOTROS</a>
                    </li>

                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadown-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        INGRESAR
                    </button>
                    <button type="button" class="btn btn-outline-dark shadown-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                        REGISTRAR
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action>
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="bi bi-person-circle fs-3 me-2"></i> Ingresar
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control shadow-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <button type="submit" class="btn btn-dark shadow-none">Entrar</button>
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none">Olvide contraseña</a>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action>
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="bi bi-person-lines-fill">Registrar</i>
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                            Nota: tus credenciales deben coincidir (cedula, nombre, etc...)

                        </span>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Correo</label>
                                    <input type="email" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Telefono</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Foto</label>
                                    <input type="file" class="form-control shadow-none">
                                </div>
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Direccion</label>
                                    <textarea class="form-control shadow-none" rows="1"></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Cedula</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Contraseña</label>
                                    <input type="password" class="form-control shadow-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirmar contraseña</label>
                                    <input type="password" class="form-control shadow-none">
                                </div>
                                <div class="text-center my-1">
                                    <button type="submit" class="btn btn-dark shadow-none">Registrar</button>
                                </div>
                            </div>
                        </div>

                        <!--<div class="mb-3">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control shadow-none">
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            
                            <a href="javascript: void(0)" class="text-secondary text-decoration-none">Olvide contraseña</a>
                        </div>-->
                    </div>

                </form>
            </div>
        </div>
    </div>