<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos Detalle</title>
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
    <?php
    if (!isset($_GET['id'])) {
        redirect('autos.php');
    }
    $data = filteration($_GET);
    $room_res = select("SELECT * FROM `cars` WHERE `id`= ? AND `status`= ? AND `removed`=?", [$data['id'], 1, 0], 'iii');


    if (mysqli_num_rows($room_res) == 0) {
        redirect('autos.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-4 ox-4">
                <h2 class="fw-bold"><?php echo $room_data['name'] ?></h2>
                <h2 class="fw-bold"><?php echo $room_data['marca'] ?></h2>

                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="autos.php" class="text-secondary text-decoration-none">AUTOS</a>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                         // Obtener la imagen activa
                             $room_img = ROOMS_IMG_PATH . "thumbnail.png";
                             $img_q = mysqli_query($con, "SELECT * FROM `car_image` 
                                                            WHERE `car_id`='$room_data[id]'");

                             if (mysqli_num_rows($img_q) > 0) {
                             $active_class = 'active'; 
                             
                             while($img_res = mysqli_fetch_assoc($img_q)){
                                echo"
                                <div class='carousel-item $active_class'>
                                <img src='".ROOMS_IMG_PATH.$img_res['image']."' class='d-block w-100 rounded'>
                                </div>";
                                $active_class='';
                             }
                              }else{
                                echo"<div class='carousel-item active'>
                                     <img src='$room_img' class='d-block w-100'>
                                     </div>";
                              }
                        
                        ?>
                       
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
              <div class="card mb-4 border-0 shadow-sm rounded-3">
                 <div class="card-body">
                    <?php
                       echo<<<price
                          <h4>Valor al dia: $$room_data[price]</h4>
                       price;

                       $fea_q = mysqli_query($con, "SELECT f.name FROM `servicios` f 
                              INNER JOIN `car_servicios` rfea ON f.id = rfea.servicios_id
                              WHERE rfea.car_id = '$room_data[id]'");

                              $features_data = "";
                              while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                                        $features_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>
                                        $fea_row[name]
                                                           </span>";
                                                          }
                         echo<<<facilities
                         <div class="mb-3">
                            <h6>Caracteristicas</h6>
                              $features_data
                         </div>
                        facilities;  
                        
                        $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
                                               INNER JOIN `cars_facilities` rfac ON f.id = rfac.facilities_id
                                               WHERE rfac.car_id = '$room_data[id]'");
                        $facilities_data = "";
                         while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                          $facilities_data .= "<span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'>
                                                   $fac_row[name]
                                               </span>";
                         }
                        echo<<<features
                         <div class="mb-3">
                            <h6>Comodidades</h6>
                              $facilities_data
                         </div>
                        features;

                        echo<<<pasajeros
                          <div class="pasajeros mb-3">
                                  <h6>
                                       <span>
                                        Personas: $room_data[pasajeros]
                                       </span>
                                  </h6>
                          </div>
                        pasajeros;

                        echo<<<placa
                         <div class="mb-3">
                            <h6>Placa: $room_data[placa]</h6>
                         </div>
                        placa;
                                                                                           
                        echo<<<book
                          <a href="#" class="btn w-100 btn-outline-dark custom-bg shadow-none mb-1">Rentar</a>
                        book;
                    ?>
                 </div>
              </div>  
            </div>

            <div class="col-12 mt-4 px-4">
                <div class="mb-4">
                    <h5>Descripción</h5>
                    <p>
                       <?php
                         echo $room_data['description']
                       ?>
                    </p>
                </div>

                <div class="mb-3">
                    <h5>Valoraciones</h5>
                    <div class="d-flex align-items-center mb-2">
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

        </div>
    </div>

    <?php require('../inc/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   

    <br><br><br>
    <br><br><br>

</body>

</html>