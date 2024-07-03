<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos</title>
    <?php require("../inc/links.php"); ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/brayner_car/css/style.css" />
    <style>
        .box {
            border-top-color: var(--teal) !important;
        }
    </style>
</head>

<body class="bg-ligth">

    <?php require('../inc/header.php'); ?>

    <div class="my-5 ox-4">
        <h2 class="fw-bold h-font text-center">NUESTROS AUTOS</h2>
        <div class="h-line bg-dark"></div>

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filtros</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="filterDropdown" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-ligth p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Ver Disponibilidad</h5>
                                <label class="form-label">Alquilar</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Retorno</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="border bg-ligth p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Caracteristicas</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f1">Caracteristica 1</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f2">Caracteristica 2</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                    <label class="form-check-label" for="f3">Caracteristica 3</label>
                                </div>

                            </div>
                            <div class="border bg-ligth p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Pasajeros</h5>
                                <div class="d-flex">
                                    <div class="me-2">
                                        <label class="form-label">Personas</label>
                                        <input type="number" class="form-control shadow-none">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/cedan.jpg" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-5 px-md-3 px-0">

                            <div class="card-body">
                                <h5>hyundai Creta</h5>
                                <h6 class="mb-3">15$ el dia</h6>
                                <div class="features mb-3">
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
                                <div class="features mb-3">
                                    <h6>Pasajeros</h6>
                                    <span class="badge bg-light text-dark text-wrap">
                                        1
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        2
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        3
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2 text-center">
                            <h6 class="mb-4">$15 dolares el dia</h6>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark custom-bg shadow-none mb-2">Rentar</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Mas detalles</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/cedan.jpg" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-5 px-md-3 px-0">

                            <div class="card-body">
                                <h5>hyundai Creta</h5>
                                <h6 class="mb-3">15$ el dia</h6>
                                <div class="features mb-3">
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
                                <div class="features mb-3">
                                    <h6>Pasajeros</h6>
                                    <span class="badge bg-light text-dark text-wrap">
                                        1
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        2
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        3
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2 text-center">
                            <h6 class="mb-4">$15 dolares el dia</h6>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Rentar</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Mas detalles</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="images/cedan.jpg" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-5 px-md-3 px-0">

                            <div class="card-body">
                                <h5>hyundai Creta</h5>
                                <h6 class="mb-3">15$ el dia</h6>
                                <div class="features mb-3">
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
                                <div class="features mb-3">
                                    <h6>Pasajeros</h6>
                                    <span class="badge bg-light text-dark text-wrap">
                                        1
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        2
                                    </span>
                                    <span class="badge bg-light text-dark text-wrap">
                                        3
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2 text-center">
                            <h6 class="mb-4">$15 dolares el dia</h6>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark custom-bg shadow-none mb-2">Rentar</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Mas detalles</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require('../inc/footer.php'); ?>


    <br><br><br>
    <br><br><br>

</body>

</html>