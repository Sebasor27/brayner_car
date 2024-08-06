<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brayner</title>
    <?php require("../inc/links.php"); ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <style>
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

<body class="bg-ligth">

    <?php require('../inc/header.php'); ?>

    <!-- Contenedor de imagenes -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php
                $res = selectALL('carousel');
                while ($row = mysqli_fetch_assoc($res)) {
                    $path = CAROUSEL_IMG_PATH;
                    echo <<<data
                       <div class="swiper-slide">
                          <img src="$path$row[image]" class="w-100 d-block" />
                       </div>
                    data;
                }

                ?>
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

        <?php
                $room_res = select("SELECT * FROM `cars` WHERE `status`= ? AND `removed`=? ORDER BY `id` DESC LIMIT 3 ", [1, 0], 'ii');

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

                             <div class="col-lg-4 col-md-6 my-3">
                              <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                <img src="$room_thumb" class="card-img-top">

                                 <div class="card-body">
                                 <h5>$room_data[name]</h5>
                                 <h6>Modelo: $room_data[marca]</h6>
                                    <h6 class="mb-4">Valor al dia: $$room_data[price]</h6>
                                 <div class="features mb-4">
                                      <h6 class="mb-1">Caracteristicas</h6>
                                        $features_data
                                      <h6 class="mb-1">Comodidades</h6>
                                       $facilities_data
                                       <h6 class="mb-3">Personas: $room_data[pasajeros]</h6>
                                       <h6 class="mb-3">N. Placa: $room_data[placa]</h6>
                                       
                                 </div>
                                    <div class="d-flex justify-content-evenly mb-2">

                                      <a href="#" class="btn btn-sm custom-bg shadow-none mb-2">Rentar</a>
                                      <a href="cars_details.php?id=$room_data[id]" class="btn btn-sm btn-outline-dark shadow-none">Mas detalles</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                         
                     data;
                }

                ?>
           
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="autos.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> Mas Carros >>></a>
        </div>
    </div>


    <!-- Nuestros servicios -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nuestros Servicios</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
        <?php
            $res = selectALL('facilities');
            $path = FEATURES_IMG_PATH;
            while ($row = mysqli_fetch_assoc($res)) {
                echo <<<data
                       <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                         <img src="$path$row[icon]" width="80px">
                          <h5 class="mt-3">$row[name]</h5>
                       </div>
                data;
            }

            ?>
            
        </div>
    </div>

    <!-- Testimonios -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimonios</h2>
    <div class="container">
        <div class="swiper swiper-test">
            <div class="swiper-wrapper">

                <div class="swiper-slide bg-white mb-3">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="images/svg/star-fill.svg" widt="30px">
                        <h6 class="m-0 ms-2">Usuario cualquiera</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Dolorum quae error sint incidunt ab inventore, culpa accusantium dolorem,
                        fugiat sunt beatae voluptates sequi et illo veniam,
                        enim autem officia harum?
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white mb-3">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="images/svg/star-fill.svg" widt="30px">
                        <h6 class="m-0 ms-2">Usuario cualquiera</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Dolorum quae error sint incidunt ab inventore, culpa accusantium dolorem,
                        fugiat sunt beatae voluptates sequi et illo veniam,
                        enim autem officia harum?
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>
                <div class="swiper-slide bg-white mb-3">
                    <div class="profile d-flex align-items-center p-4">
                        <img src="images/svg/star-fill.svg" widt="30px">
                        <h6 class="m-0 ms-2">Usuario cualquiera</h6>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Dolorum quae error sint incidunt ab inventore, culpa accusantium dolorem,
                        fugiat sunt beatae voluptates sequi et illo veniam,
                        enim autem officia harum?
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- acerca de nosotros -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Acerca de nosotros</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100" height="320" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d997.4431667061135!2d-79.1723444718781!3d-0.27409342152986277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sec!4v1720018559601!5m2!1ses!2sec" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Llamanos</h5>
                    <a href="tel: +593 989645329" class="d-inline-block mb-2 text-decration-none text-dark">
                        <i class="bi bi-telephone-inbound"></i> +593 989645329
                    </a>
                    <br>
                    <a href="tel: +593 989645329" class="d-inline-block text-decration-none text-dark">
                        <i class="bi bi-telephone-inbound"></i> +593 989645329
                    </a>

                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Facebook</h5>
                    <a href="" class="d-inline-block mb-3">
                        <span class="badge bg-ligth text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Red Social
                        </span>
                    </a>
                    <a href="" class="d-inline-block mb-3">
                        <span class="badge bg-ligth text-dark fs-6 p-2">
                            <i class="bi bi-instagram"></i> Red Social
                        </span>
                    </a>
                    <a href="" class="d-inline-block mb-3">
                        <span class="badge bg-ligth text-dark fs-6 p-2">
                            <i class="bi bi-whatsapp"></i></i> Red Social
                        </span>
                    </a>
                    <br>
                    <a href="tel: +593 989645329" class="d-inline-block text-decration-none text-dark">
                        <i class="bi bi-car-front"></i> Brayner_Car
                    </a>

                </div>
            </div>
        </div>
    </div>


    <?php require('../inc/footer.php'); ?>


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
        var swiper = new Swiper(".swiper-test", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    </script>
</body>

</html>

