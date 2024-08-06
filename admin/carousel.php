<?php
require("../admin/inc/essentials.php");
adminLogin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Administrador</title>
  <?php require("../admin/inc/links.php");
  ?>

</head>

<body class="bg-ligth">

  <?php require("../admin/inc/header.php"); ?>



  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4">Imagenes</h3>

       

    <!--Imagenes seccion-->
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h5 class="card-tittle m-0">Imagenes pagina principal</h5>
          <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#carousel-s">
            <i class="bi bi-plus-square"></i>Añadir
          </button>
        </div>
        <div class="row" id="carousel-data">
         
           
        </div>
         
      </div>
    </div>

    <!--Imagenes modal-->
    <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="carousel_s_form">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Añadir imagen</h5>
            </div>
            <div class="modal-body">
              

              <div class="mb-3">
                <label class="form-label fw-bold">Foto</label>
                <input type="file" name="carousel_picture" id="carousel_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="carousel_picture.value=''" class="btn text-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn custom-bg text-white">Enviar</button>
            </div>
        </form>

      </div>
    </div>



  </div>
  </div>
  </div>


  <?php require("../admin/inc/scripts.php"); ?>
  <script src="../admin/scripts/carousel.js"></script>

</body>

</html>