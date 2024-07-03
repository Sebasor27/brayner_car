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
    <link rel="stylesheet" href="/brayner_car/css/style.css"/>
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
                        <div class="d-flex justify-content-evenly mb-2">
                           
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Rentar</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mas detalles</a>
                        </div>
                    </div>
                    
                </div>
               
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/toyota.jpg" class="card-img-top">
                    
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
                        <div class="d-flex justify-content-evenly mb-2">
                           
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Rentar</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mas detalles</a>
                        </div>
                    </div>
                    
                </div>
               
            </div>
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
                        <div class="d-flex justify-content-evenly mb-2">
                           
                        <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Rentar</a>
                        <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Mas detalles</a>
                        </div>
                    </div>
                    
                </div>
               
            </div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> Mas Carros >>></a>
        </div>
    </div>


    <!-- Nuestros servicios -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Nuestros Servicios</h2>
    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                   <img src="images/svg/car-front-fill.svg" width="80px">
                   <h5 mt-3>Renta de autos</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                   <img src="images/svg/box2.svg" width="80px">
                   <h5 mt-3>Envio de paquetes</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                   <img src="images/svg/radar.svg" width="80px">
                   <h5 mt-3>Control por radar</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                   <img src="images/svg/thermometer-snow.svg" width="80px">
                   <h5 mt-3>Climatizado</h5>
            </div>
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
        <iframe class="w-100" height="320" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d997.4431667061135!2d-79.1723444718781!3d-0.27409342152986277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sec!4v1720018559601!5m2!1ses!2sec"  loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                <a href=""class="d-inline-block mb-3">
                 <span class="badge bg-ligth text-dark fs-6 p-2">
                 <i class="bi bi-facebook me-1"></i> Red Social
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

   <div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
           <h3 class="h-font fw-bold fs-3 mb-2">Brayner Car</h3>
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident inventore, fugiat tempora corporis sapiente vel facilis ducimus officia quasi, 
            voluptatum atque dolor 
            iure unde qui doloribus delectus neque accusantium mollitia?</p>
        </div>
        <div class="col-lg-4 p-4">
           <h5 class="mb-3">Links</h5>
           <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Pagina Principal</a><br>
           <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Carros</a><br>
           <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Servicios</a><br>
           <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Conatctenos</a><br>
           <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Acerca de nosotros</a>

        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Siguenos en Facebook</h5>
            <a href=""class="d-inline-block mb-3">
                 <span class="badge bg-ligth text-dark fs-6 p-2">
                 <i class="bi bi-facebook me-1"></i> Red Social
                 </span>
                </a>
                <br>
                <a href="tel: +593 989645329" class="d-inline-block text-decration-none text-dark mb-2">
                <i class="bi bi-car-front"></i> Brayner_Car
            </a>
        </div>

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