<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca De Nosotros</title>
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
        <h2 class="fw-bold h-font text-center">ACERCA DE NOSOTROS</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Iusto molestias doloribus dolorem ratione neque non, laborum sunt rem,
            ad nisi laboriosam harum hic! Nisi, architecto? <br> At voluptate quasi rerum nostrum.
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-mb-5 mb-4 order-1">
                <h3 class="mb-3">Loremga fugit</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Qui dolorem soluta quae debitis beatae
                    deserunt sequi iure itaque, rerum odit eum ipsam dolores error aperiam, eos, eligendi nihil veritatis quisquam.
                </p>
            </div>
            <div class="col-lg-5 col-md-5 order-2">
                <img src="images/rentita.jpg" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/rental.jfif" width="70px">
                    <h4>20+ Autos a nivel nacional</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/rental.jfif" width="70px">
                    <h4 class="mt-3">200+ Clientes a nivel nacional</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                    <img src="images/rental.jfif" width="70px">
                    <h4 class="mt-3">80% nos prefieren</h4>
                </div>
            </div>
        </div>
    </div>

    <?php require('../inc/footer.php'); ?>


    <br><br><br>
    <br><br><br>

</body>

</html>