<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brayner - Contacto</title>
    <?php require("../inc/links.php"); ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/brayner_car/css/style.css" />
   
</head>

<body class="bg-ligth">

    <?php require('../inc/header.php'); ?>

    <div class="my-5 ox-4">
        <h2 class="fw-bold h-font text-center">Contactenos</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Iusto molestias doloribus dolorem ratione neque non, laborum sunt rem,
            ad nisi laboriosam harum hic! Nisi, architecto? <br> At voluptate quasi rerum nostrum.
        </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                <iframe class="w-100 rounded mb-4" height="320" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d997.4431667061135!2d-79.1723444718781!3d-0.27409342152986277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sec!4v1720018559601!5m2!1ses!2sec" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  <h5 class="mt-4">Direccion</h5>
                  <a href="https://maps.app.goo.gl/PfPEiAijgEaihJjK9" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                  <i class="bi bi-geo"></i>  Sto.Domingo de los Tsáchilas, Av. Rio Toachi y Provincia de Orellana. 
                  </a>
                  <h5>Llamanos</h5>
                    <a href="tel: +593 989645329" class="d-inline-block mb-2 text-decration-none text-dark">
                        <i class="bi bi-telephone-inbound"></i> +593 989645329
                    </a>
                    <br>
                    <a href="tel: +593 989645329" class="d-inline-block text-decration-none text-dark">
                        <i class="bi bi-telephone-inbound"></i> +593 989645329
                    </a>
                    <h5 class="mt-4">Correo</h5>
                    <a href="mailto: brayner_car2020@gmail.com" class="d-inline-block text-decration-none text-dark">
                        brayner_car2020@gmail.com
                    </a>
                    <div class="bg-white p-4 rounded mb-4">
                    <h5 class="mt-4">Facebook</h5>
                    <a href="" class="d-inline-block mb-3 text-dark fs-5 me-2">
                        <span class="badge bg-ligth text-dark fs-5 p-2">
                            <i class="bi bi-facebook me-1"></i>
                        </span>
                    </a>
                    <a href="" class="d-inline-block mb-3">
                        <span class="badge bg-ligth text-dark fs-5 me-2">
                            <i class="bi bi-instagram"></i>
                        </span>
                    </a>
                    <a href="" class="d-inline-block mb-3">
                        <span class="badge bg-ligth  text-dark fs-5 me-2">
                            <i class="bi bi-whatsapp"></i></i>
                        </span>
                    </a>
                </div>
            </div>
            
        </div>
        <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                   <form>
                    <h5>Envia un mensaje</h5>
                   <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">Nombre</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">CORREO</label>
                            <input type="email" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">ASUNTO</label>
                            <input type="text" class="form-control shadow-none">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight: 500;">MENSAJE</label>
                            <textarea class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success custom-bg mt-3 shadow-none">ENVIAR</button>
                   </form>
                </div>
            </div>
    </div>
    <?php require('../inc/footer.php'); ?>


    <br><br><br>
    <br><br><br>

</body>

</html>