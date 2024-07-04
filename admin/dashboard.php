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

 <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between">
    <h3 class="mb-0">Panel Administrador</h3>
    <a href="logout.php" class="btn btn-light btn-sm">Cerrar Sesion</a>
 </div>

    
  
  <?php require("../admin/inc/scripts.php"); ?>
</body>
</html>