<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        .h-font {
            font-family: "Merienda", cursive;
        }

        .custom-bg {
            background-color: #2ec1ac;
        }

        .custom-bg:hover {
            background-color: #279eBc;
        }

        .avala-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .avala-form {
                margin-top: 0px;
                padding: 0 35px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">BRAYNER CAR</a>
            <button class="navbar-toggler shadow name" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">CARROS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">INFORMACION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">CONTACTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="#">ACERCA DE NOSOTROS</a>
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
    <!-- Contenedor de imagenes -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/camion.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/toyota.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/cedan.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/COLOR-BLANCO.jpg" class="w-100 d-block" />
                </div>
            </div>
        </div>
    </div>
    <!-- Carros disponibles -->
    <div class="container avala-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-5">Ver disponibilidad del auto</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label font-weigth: 500">Alquilar</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label font-weigth: 500">Fecha de retorno</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label font-weigth: 500">Tipo de carro</label>
                            <select class="form-select shadow-none">
                                <option selected>Selecciona el carro</option>
                                <option value="1">Auto</option>
                                <option value="2">Camioneta</option>
                                <option value="3">Furgoneta</option>
                                <option value="3">Camion</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label font-weigth: 500">Personas</label>
                            <select class="form-select shadow-none">
                                <option selected>Para cuantas personas</option>
                                <option value="1">Una</option>
                                <option value="2">Cuatro</option>
                                <option value="3">Seis</option>
                                <option value="3">Doce</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Nuestros autos -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nuestros Autos</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/hyunday creta.jpg" class="card-img-top">
                    
                    <div class="card-body">
                        <h5>hyundai Creta</h5>
                        <h6 class="mb-4">15$ el dia</h6>
                        <div class="features mb-4">
                            <h6>Caracteristicas</h6>
                            <span class="badge bg-light text-dark text-wrap">
                              placa abc-323
                        </span>
                        <span class="badge bg-light text-dark text-wrap">
                              Capacidad 5 personas
                        </span>
                        <span class="badge bg-light text-dark text-wrap">
                              color gris
                        </span>
                        </div>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> Mas Carros >>></a>
        </div>
    </div>
    <br><br><br>
    <br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });
    </script>
</body>

</html>