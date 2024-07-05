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
        <h3 class="mb-4">Configuracion</h3>
        <!--Cinfiguraciones generales -->

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-tittle m-0">Configuracion General</h5>
              <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#general-setting">
                <i class="bi bi-pencil-square"></i>Editar
              </button>
            </div>
            <h6 class="card-subtitle mb-1 fw-bold">Titulo del sitio</h6>
            <p class="card-text" id="site_title"></p>
            <h6 class="card-subtitle mb-1 fw-bold">Acerca de nosotros</h6>
            <p class="card-text" id="site_about"></p>
          </div>
        </div>


        <!--Cinfiguraciones generales modal-->


        <div class="modal fade" id="general-setting" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form id="general_s_form">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Configuraciones Generales</h5>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label fw-bold">Titulo del Sitio</label>
                    <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label fw-bold">Acerca de nosotros</label>
                    <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn custom-bg text-white">Enviar</button>
                </div>
            </form>

          </div>
        </div>
      </div>

      <!--Seccion cerrar-->
      <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-tittle m-0">Cerrar pagina web</h5>

          </div>
          <div class="form-check form-switch">

            <form>
              <input onchange="upd_shutdown(this.val)" class="form-check-input" type="checkbox" id="shutdown-toggle">
            </form>
          </div>
          <p class="card-text">
            No se permitirá a ningún cliente alquilar un auto de la compañia cuando el modo de apagado esté activado.

          </p>
        </div>
      </div>

      <!--Contactanos seccion detalle-->
      <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-tittle m-0">Configuracion de contacto</h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#contact-s">
              <i class="bi bi-pencil-square"></i>Editar
            </button>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Dirección</h6>
                <p class="card-text" id="address"></p>
              </div>
              <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                <p class="card-text" id="gmap"></p>
              </div>
              <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Telefono</h6>
                <p class="card-text mb-1">
                  <i class="bi bi-telephone-inbound"></i>
                  <span id="pn1"></span>
                </p>
                <p class="card-text">
                  <i class="bi bi-telephone-inbound"></i>
                  <span id="pn2"></span>
                </p>
              </div>
              <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Correo</h6>
                <p class="card-text" id="email"></p>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">Redes Sociales</h6>
                <p class="card-text mb-1">
                  <i class="bi bi-facebook me-1"></i>
                  <span id="fb"></span>
                </p>
                <p class="card-text mb-1">
                  <span id="insta">
                    <i class="bi bi-instagram"></i>
                  </span>
                </p>
                <p class="card-text">
                  <i class="bi bi-whatsapp"></i></i>
                  <span id="tw"></span>
                </p>
              </div>

              <div class="mb-4">
                <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>

              </div>

            </div>
          </div>

        </div>
      </div>

      <!--Contactenos modal-->

      <div class="modal fade" id="contact-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <form id="contacts_s_form">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Configuraciones Generales</h5>
              </div>
              <div class="modal-body">

                <div class="container-fluid p-0">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label fw-bold">Direccion</label>
                        <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label fw-bold">Google Map Link</label>
                        <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label fw-bold">Telefono (Con codigo de pais)</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="bi bi-telephone-inbound"></i></span>
                          <input type="text" name="pn1" id="pn1_inp" class="form-control shadow-none" required>
                        </div>
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="bi bi-telephone-inbound"></i></span>
                          <input type="text" name="pn2" id="pn2_inp" class="form-control shadow-none">
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label fw-bold">Correo</label>
                        <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label fw-bold">Redes Sociales</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                          <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                        </div>
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                          <input type="text" name="insta" id="insta_inp" class="form-control shadow-none">
                        </div>
                        <div class="input-group mb-3">
                          <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                          <input type="text" name="tw" id="tw_inp" class="form-control shadow-none">
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label fw-bold">iFrame Src</label>
                        <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" onclick="contacts_inp(contact_data)" class="btn text-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn custom-bg text-white">Enviar</button>
              </div>
          </form>

        </div>
      </div>
    </div>


  </div>
  </div>
  </div>


  <?php require("../admin/inc/scripts.php"); ?>
  <script>
    let general_data, contact_data;

    let general_s_form = document.getElementById('general_s_form');

    let site_title_inp = document.getElementById('site_title_inp');
    let site_about_inp = document.getElementById('site_about_inp');

    let contacts_s_form = document.getElementById('contacts_s_form');

    function get_general() {
      let site_title = document.getElementById('site_title');
      let site_about = document.getElementById('site_about');


      let shutdown_toggle = document.getElementById('shutdown-toggle');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);

      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        general_data = JSON.parse(this.responseText);
        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;

        if (general_data.shutdown == 0) {
          shutdown_toggle.checked = false;
          shutdown_toggle.value = 0;
        } else {
          shutdown_toggle.checked = true;
          shutdown_toggle.value = 1;
        }
      }


      xhr.send("get_general");
    }

    general_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      upd_general(site_title_inp.value, site_about_inp.value);

    })

    function upd_general(site_title_val, site_about_val) {

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);

      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {

        var myModal = document.getElementById('general-setting');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
          alert('success', 'cambios guardados!!');
          get_general();
        } else {
          alert('error', 'cambios no se guardaron');
        }
      }


      xhr.send("site_title=" + site_title_val + "&site_about=" + site_about_val + "&upd_general");
    }

    function upd_shutdown() {
      let shutdown_toggle = document.getElementById('shutdown-toggle');
      let val = shutdown_toggle.checked ? 1 : 0;

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        if (this.responseText == 1) {
          if (val == 1) {
            alert('success', 'El sitio ha sido cerrado');
          } else {
            alert('success', 'El sitio ha sido encendido');
          }
          get_general();
        } else {
          alert('error', 'No se pudo actualizar el estado');
        }
      };

      xhr.send("upd_shutdown=" + val);
    }

    //Detalle contacto

    function get_contacts() {
      let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw']
      let iframe = document.getElementById('iframe');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);

      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        console.log(this.responseText); // Para ver qué está devolviendo el servidor
        try {
          contact_data = JSON.parse(this.responseText);
          contact_data = Object.values(contact_data);

          for (i = 0; i < contacts_p_id.length; i++) {
            document.getElementById(contacts_p_id[i]).innerText = contact_data[i + 1];
          }
          iframe.src = contact_data[9];
          contacts_inp(contact_data);


        } catch (e) {
          console.error("Error parsing JSON:", e);
        }
      }

      xhr.send("get_contacts");
    }

    function contacts_inp(data) {
      let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];

      for (i = 0; i < contacts_inp_id.length; i++) {
        document.getElementById(contacts_inp_id[i]).value = data[i + 1];

      }

    }

    contacts_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      upd_contacts();
    });

    function upd_contacts() {
      let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw', 'iframe'];
      let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];
      let data_str = "";

      for (let i = 0; i < index.length; i++) {
        data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
      }
      data_str += "upd_contacts";

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        console.log(this.responseText);
        var myModal = document.getElementById('contacts-s');
        if (myModal) {
          var modal = bootstrap.Modal.getInstance(myModal);
          modal.hide();
        } else {
          console.error('El modal no se encontró en el DOM.');
        }

        if (this.responseText == 1) {
          alert('success', 'Cambios guardados');
          get_contacts();
        } else {
          alert('error', 'No se pudo actualizar el estado');
        }
      }
      xhr.send(data_str);
    }


    window.onload = function() {
      get_general();
      get_contacts();
    }
  </script>

</body>

</html>