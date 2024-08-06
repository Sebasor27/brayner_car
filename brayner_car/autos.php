<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos</title>
    <?php require("../inc/links.php"); ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
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

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
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

                <?php
                $room_res = select("SELECT * FROM `cars` WHERE `status`= ? AND `removed`=?", [1, 0], 'ii');

                while ($room_data = mysqli_fetch_assoc($room_res)) {
                    // obtener servicios del carro
                    $fea_q = mysqli_query($con, "SELECT f.name FROM `servicios` f 
                              INNER JOIN `car_servicios` rfea ON f.id = rfea.servicios_id
                              WHERE rfea.car_id = '$room_data[id]'");

                    $features_data = "";
                    while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                        $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>
                                                  $fea_row[name]
                                               </span>";
                    }
                    // Obtener facilities del auto
                    $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
                                                 INNER JOIN `cars_facilities` rfac ON f.id = rfac.facilities_id
                                                 WHERE rfac.car_id = '$room_data[id]'");
                    $facilities_data = "";
                    while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                        $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>
                                                      $fac_row[name]
                                                   </span>";
                    }


                    // Obtener la imagen activa
                    $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
                    $thumb_q = mysqli_query($con, "SELECT * FROM `car_image` 
                                                   WHERE `car_id`='$room_data[id]' 
                                                   AND `thumb`='1'");

                    if (mysqli_num_rows($thumb_q) > 0) {
                        $thumb_res = mysqli_fetch_assoc($thumb_q);
                        $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                    }

                    // imprimir carta auto
                    echo <<<data
                         <div class="card mb-4 border-0 shadow">
                             <div class="row g-0 p-3 align-items-center">
                             <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                 <img src="$room_thumb" class="img-fluid rounded-start">
                             </div>

                             <div class="col-md-5 px-md-3 px-0">

                               <div class="card-body">
                                <h5>$room_data[name]</h5>
                                <h6>Modelo: $room_data[marca]</h6>
                                <div class="features mb-3">
                                    
                                    <h6>Caracteristicas</h6>
                                     $features_data
                                </div>
                                <div class="features mb-3">
                                    <h6>Comodidades</h6>
                                     $facilities_data
                                </div>
                                <div class="pasajeros mb-3">
                                    <h6>Personas: $room_data[pasajeros]</h6>
                                     
                                </div>
                               </div>

                               </div>
                             
                               <div class="col-md-2 text-center">
                            <h6 class="mb-4">Valor al dia: $$room_data[price]</h6>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark custom-bg shadow-none mb-2">Rentar</a>
                            <a href="cars_details.php?id=$room_data[id]" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Mas detalles</a>
                             </div>
                          </div>
                       </div>
                     data;
                }
                ?>

            </div>

        </div>
    </div>

    <?php require('../inc/footer.php'); ?>


    <br><br><br>
    <br><br><br>

</body>

</html>