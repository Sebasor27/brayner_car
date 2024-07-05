<?php

require("../inc/db_config.php");
require("../inc/essentials.php");
adminLogin();

if (isset($_POST['get_general'])) {
    $q = "SELECT * FROM `settings` WHERE `sr_no` = ?";
    $values = [1];
    $res = select($q,$values,"i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

  if (isset($_POST['upd_general'])) {
    $frm_data = filteration($_POST);

    $q = "UPDATE `settings` SET `site_title`= ?,`site_about`= ? WHERE `sr_no`=?";
    $values = [$frm_data['site_title'],$frm_data['site_about'],1];
    $res = update($q,$values,'ssi');
    echo $res;

 }

 if (isset($_POST['upd_shutdown'])) {
  $frm_data = filter_input(INPUT_POST, 'upd_shutdown', FILTER_VALIDATE_INT);

  $q = "UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
  $values = [$frm_data, 1];
  $res = update($q, $values, 'ii');
  echo $res;
}

if (isset($_POST['get_contacts'])) {
  $q = "SELECT * FROM `contact_details` WHERE `sr_no` = ?";
  $values = [1];
  $res = select($q,$values,"i");
  if ($res) {
      $data = mysqli_fetch_assoc($res);
      $json_data = json_encode($data);
      echo $json_data;
  } else {
      echo json_encode(["error" => "No data found"]);
  }
}

if (isset($_POST['upd_contacts'])) {
  $frm_data = filteration($_POST);

  $q = "UPDATE `contact_details` SET `address`=?, `gmap`=?, `p1`=?, `pn2`=?, `email`=?, `fb`=?, `insta`=?, `whats`=?, `iframe`=? WHERE 1";
  $values = [$frm_data['address'], $frm_data['gmap'], $frm_data['pn1'], $frm_data['pn2'], $frm_data['email'], $frm_data['fb'], $frm_data['insta'], $frm_data['tw'], $frm_data['iframe']];
  
  // Verifica el número de elementos en el array $values
  if (count($values) === 9) {
      $res = update($q, $values, 'sssssssss');
      echo $res;
  } else {
      echo "Error: El número de valores no coincide con el número de parámetros.";
  }
}



?>