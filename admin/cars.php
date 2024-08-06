<?php
require("../admin/inc/essentials.php");
require('../admin/inc/db_config.php');
adminLogin();

if (isset($_GET['seen'])) {
  $frm_data = filteration($_GET);

  if ($frm_data['seen'] == 'all') {
    $q = "UPDATE `user_queries` SET `seen`= ?";
    $values = [1];
    if (update($q, $values, 'i')) {
      alert('success', 'Marcado todo como leido');
    } else {
      alert('error', 'Operacion fallida');
    }
  } else {
    $q = "UPDATE `user_queries` SET `seen`= ? WHERE `sr_no`= ?";
    $values = [1, $frm_data['seen']];
    if (update($q, $values, 'ii')) {
      alert('success', 'Marcado como leido');
    } else {
      alert('error', 'Operacion fallida');
    }
  }
}
if (isset($_GET['del'])) {
  $frm_data = filteration($_GET);

  if ($frm_data['del'] == 'all') {
  } else {
    $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
    $values = [$frm_data['del']];
    if (delete($q, $values, 'i')) {
      alert('error', 'Mensaje eliminado');
    } else {
      alert('error', 'Operacion fallida');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Carros</title>
  <?php require("../admin/inc/links.php"); ?>
</head>

<body class="bg-light">

  <?php require("../admin/inc/header.php"); ?>

  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4">Carros</h3>

        <!--Imagenes seccion-->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">

            <div class="text-end mb-4">
              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-car">
                <i class="bi bi-plus-square"></i>Añadir
              </button>
            </div>

            <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll">
              <table class="table table-hover border text-center">
                <thead class="sticky-top">
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Pasajeros</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Accion</th>

                  </tr>
                </thead>
                <tbody id="car-data">

                </tbody>
              </table>
            </div>

          </div>
        </div>


      </div>
    </div>
  </div>

  <!--add car modal-->
  <div class="modal fade" id="add-car" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="add_car_form" autocomplete="off">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Añadir Carro</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nombre</label>
                <input type="text" name="name" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Marca</label>
                <input type="text" name="marca" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Precio</label>
                <input type="number" name="price" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Placa</label>
                <input type="text" name="placa" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Pasajeros</label>
                <input type="number" min="1" name="passenger" class="form-control shadow-none" required>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Caracteristicas</label>
                <div class="row">
                  <?php
                  $res = selectALL('servicios');
                  if ($res) {
                    while ($opt = mysqli_fetch_assoc($res)) {
                      echo "
                           <div class='col-md-3 mb-1'>
                               <label>
                                <input type='checkbox' name='servicios' value='$opt[id]' class='form-check-input shadow-none'>
                                $opt[name]
                               </label>
                           </div> 
                       ";
                    }
                  } else {
                    echo 'No se encontraron resultados.';
                  }
                  ?>
                </div>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Comodidades</label>
                <div class="row">
                  <?php
                  $res = selectALL('facilities');
                  if ($res) {
                    while ($opt = mysqli_fetch_assoc($res)) {
                      echo "
                           <div class='col-md-3 mb-1'>
                               <label>
                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                $opt[name]
                               </label>
                           </div> 
                       ";
                    }
                  } else {
                    echo 'No se encontraron resultados.';
                  }
                  ?>
                </div>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Descripcion</label>
                <textarea name="desc" row="4" class="form-control shadow-none" required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn custom-bg text-white">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <!--edit car modal-->
  <div class="modal fade" id="edit-car" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="edit_car_form" autocomplete="off">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Carro</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nombre</label>
                <input type="text" name="name" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Marca</label>
                <input type="text" name="marca" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Precio</label>
                <input type="number" name="price" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Placa</label>
                <input type="text" name="placa" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Pasajeros</label>
                <input type="number" min="1" name="passenger" class="form-control shadow-none" required>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Caracteristicas</label>
                <div class="row">
                  <?php
                  $res = selectALL('servicios');
                  if ($res) {
                    while ($opt = mysqli_fetch_assoc($res)) {
                      echo "
                           <div class='col-md-3 mb-1'>
                               <label>
                                <input type='checkbox' name='servicios' value='$opt[id]' class='form-check-input shadow-none'>
                                $opt[name]
                               </label>
                           </div> 
                       ";
                    }
                  } else {
                    echo 'No se encontraron resultados.';
                  }
                  ?>
                </div>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Comodidades</label>
                <div class="row">
                  <?php
                  $res = selectALL('facilities');
                  if ($res) {
                    while ($opt = mysqli_fetch_assoc($res)) {
                      echo "
                           <div class='col-md-3 mb-1'>
                               <label>
                                <input type='checkbox' name='facilities' value='$opt[id]' class='form-check-input shadow-none'>
                                $opt[name]
                               </label>
                           </div> 
                       ";
                    }
                  } else {
                    echo 'No se encontraron resultados.';
                  }
                  ?>
                </div>
              </div>
              <div class="col-12 mb-3">
                <label class="form-label fw-bold">Descripcion</label>
                <textarea name="desc" row="4" class="form-control shadow-none" required></textarea>
              </div>
              <input type="hidden" name="car_id">
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn custom-bg text-white">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--carros imagenes-->
  <div class="modal fade" id="room-images" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nombre del carro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="image-alert">

          </div>
          <div class="border-bottom border-3 pb-3 mb-3">
            <form id="add_image_form" enctype="multipart/form-data">
              <label class="form-label fw-bold">Añadir imagen</label>
              <input type="file" name="image" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>
              <button class="btn custom-bg text-white">Añadir</button>
              <input type="hidden" name="room_id">
            </form>
          </div>
          <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll">
            <table class="table table-hover border text-center">
              <thead class="sticky-top">
                <tr class="bg-dark text-light sticky-top">
                  <th scope="col" width="68%">Imagen</th>
                  <th scope="col">OK</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody id="room-image-data">
              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>
  </div>

  <?php require("../admin/inc/scripts.php"); ?>
  <script src='../admin/scripts/cars.js'></script>
</body>

</html>