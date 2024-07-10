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

  <script>
    let feature_s_form = document.getElementById('feature_s_form');
    let facility_s_form = document.getElementById('facility_s_form');

    feature_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      add_feature();
    });

    function add_feature() {
      let data = new FormData();
      data.append('name', feature_s_form.elements['feature_name'].value);
      data.append('add_feature', '');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/features_facilities.php", true);

      xhr.onload = function() {
        console.log(this.responseText);
        var myModal = document.getElementById('feature-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
          alert('success', 'Nuevo servicio añadido');
          feature_s_form.elements['feature_name'].value = '';
          get_features();
        } else {
          alert('error', 'Servidor caido!!');
        }
      }

      xhr.send(data);
    }

    function get_features() {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/features_facilities.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        document.getElementById('features-data').innerHTML = this.responseText;
      }

      xhr.send("get_features");
    }

    function rem_feature(val) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/features_facilities.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        if (this.responseText == 1) {
          alert('success', 'Servicio Removido');
          get_features();
        } else if (this.responseText == 'servicio_añadido') {
          alert('error', 'Servicio añadido a carro');
        } else {
          alert('error', 'Servidor caido');
        }
      }

      xhr.send("rem_feature=" + val);
    }

    facility_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      add_facility();
    });

    function add_facility() {
      let data = new FormData();
      data.append('name', facility_s_form.elements['facility_name'].value);
      data.append('icon', facility_s_form.elements['facility_icon'].files[0]);
      data.append('desc', facility_s_form.elements['facility_desc'].value);
      data.append('add_facility', '');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/features_facilities.php", true);

      xhr.onload = function() {
        console.log(this.responseText);
        var myModal = document.getElementById('facility-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 'inv_img') {
          alert('error', 'Solo en formato SVG');
        } else if (this.responseText == 'inv_size') {
          alert('error', 'Tamaño aceptable es de 1mb');
        } else if (this.responseText == 'upd_failed') {
          alert('error', 'Imagen no se pudo cargar');
        } else if (this.responseText == '1') { // Asegúrate de que estás comparando con el valor correcto
          alert('success', 'Nueva comodidad añadida');
          facility_s_form.reset();
          get_facilities(); // Actualiza los datos después de agregar
        } else {
          alert('error', 'Error al agregar comodidad');
        }
      }

      xhr.send(data);
    }

    function get_facilities() {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/features_facilities.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        document.getElementById('facilities-data').innerHTML = this.responseText;
      }

      xhr.send("get_facilities");
    }

    function rem_facility(val) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/features_facilities.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        if (this.responseText == 1) {
          alert('success', 'Comodidad Removido');
          get_facilities();
        } else if (this.responseText == 'servicio_añadido') {
          alert('error', 'Servicio añadido a carro');
        } else {
          alert('error', 'Servidor caido');
        }
      }

      xhr.send("rem_facility=" + val);
    }


    window.onload = function() {
      get_features();
      get_facilities();
    }
  </script>
</body>

</html>