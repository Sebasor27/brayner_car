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

        <!--Configuraciones generales -->
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


    <!--Managment team section-->
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h5 class="card-tittle m-0">Managment Team</h5>
          <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
            <i class="bi bi-plus-square"></i>Añadir
          </button>
        </div>
        <div class="row" id="team-data">
         
           
        </div>
         
      </div>
    </div>

    <!--Managment team modal-->
    <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="team_s_form">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Añadir miembro del team</h5>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label fw-bold">Nombre</label>
                <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Foto</label>
                <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="member_name.value='', member_picture.value=''" class="btn text-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn custom-bg text-white">Enviar</button>
            </div>
        </form>

      </div>
    </div>



  </div>
  </div>
  </div>


  <?php require("../admin/inc/scripts.php"); ?>
  <script src="../admin/scripts/settings.js"></script>

</body>

</html>