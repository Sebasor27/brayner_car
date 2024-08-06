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
  <title>Servicios y comodidades</title>
  <?php require("../admin/inc/links.php"); ?>
</head>

<body class="bg-light">

  <?php require("../admin/inc/header.php"); ?>

  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4">Servicios y comodidades</h3>

        <!--Imagenes seccion-->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-tittle m-0">Servicios</h5>
              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#feature-s">
                <i class="bi bi-plus-square"></i>Añadir
              </button>
            </div>

            <div class="table-responsive-md" style="height: 350px; overflow-y: scroll">
              <table class="table table-hover border">
                <thead class="sticky-top">
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody id="features-data">

                </tbody>
              </table>
            </div>

          </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">

            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-tittle m-0">Comodidades</h5>
              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facility-s">
                <i class="bi bi-plus-square"></i>Añadir
              </button>
            </div>

            <div class="table-responsive-md" style="height: 350px; overflow-y: scroll">
              <table class="table table-hover border">
                <thead>
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Icono</th>
                    <th scope="col">Nombre</th>
                    <th scope="col" width="48%">Descripcion</th>
                    <th scope="col">Accion</th>
                  </tr>
                </thead>
                <tbody id="facilities-data">

                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!--feature modal-->
  <div class="modal fade" id="feature-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="feature_s_form">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Añadir Servicio</h5>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label fw-bold">Nombre</label>
              <input type="text" name="feature_name" class="form-control shadow-none" required>
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

  <!--facility modal-->
  <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form id="facility_s_form">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Añadir Comodidad</h5>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label fw-bold">Nombre</label>
              <input type="text" name="facility_name" class="form-control shadow-none" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-bold">Icono</label>
              <input type="file" name="facility_icon" accept=".svg" class="form-control shadow-none" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Descripción</label>
              <textarea name="facility_desc" class="form-control shadow-none" rows="3" name="facility_description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn text-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn custom-bg text-white">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php require("../admin/inc/scripts.php"); ?>
  
  <script src="../admin/scripts/features_facilities.js"></script>

</body>

</html>