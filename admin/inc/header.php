<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
    <h3 class="mb-0 h-font">Panel Administrador</h3>
    <a href="logout.php" class="btn btn-light btn-sm">Cerrar Sesion</a>
  </div>

  <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-white rounded shadow">
      <div class="container-fluid flex-lg-column align-items-stretch">
        <h4 class="mt-2">Administrador</h4>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">

          <ul class="nav nav-pills flex-column">
            
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">Panel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-success" href="user_queries.php">Mensajes Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-success" href="carousel.php">Imagenes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-success" href="setting.php">Configuración</a>
            </li>
            
          </ul>



        </div>
      </div>
    </nav>
  </div>