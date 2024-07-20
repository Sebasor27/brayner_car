<?php

require("../inc/db_config.php");
require("../inc/essentials.php");
adminLogin();

if (isset($_POST['add_car'])) {
  $servicios = json_decode($_POST['servicios'], true);
  $facilities = json_decode($_POST['facilities'], true);

  $frm_data = filteration($_POST);
  $flag = 0;

  $q1 = "INSERT INTO `cars`(`name`, `marca`, `price`, `placa`, `pasajeros`, `description`) VALUES (?,?,?,?,?,?)";
  $values = [$frm_data['name'], $frm_data['marca'], $frm_data['price'], $frm_data['placa'], $frm_data['passenger'], $frm_data['desc']];

  if (insert($q1, $values, 'ssisis')) {
    $flag = 1;
  } else {
    echo "Error en la inserción de 'cars'";
    exit;
  }

  $car_id = mysqli_insert_id($con);
  $q2 = "INSERT INTO `cars_facilities`(`car_id`, `facilities_id`) VALUES (?,?)";

  if ($stmt = mysqli_prepare($con, $q2)) {
    foreach ($facilities as $f) {
      mysqli_stmt_bind_param($stmt, 'ii', $car_id, $f);
      if (!mysqli_stmt_execute($stmt)) {
        echo "Error en la inserción de 'cars_facilities': " . mysqli_error($con);
        exit;
      }
    }
    mysqli_stmt_close($stmt);
  } else {
    echo "Error en la preparación de 'cars_facilities': " . mysqli_error($con);
    exit;
  }

  $q3 = "INSERT INTO `car_servicios`(`car_id`, `servicios_id`) VALUES (?,?)";

  if ($stmt = mysqli_prepare($con, $q3)) {
    foreach ($servicios as $s) {
      mysqli_stmt_bind_param($stmt, 'ii', $car_id, $s);
      if (!mysqli_stmt_execute($stmt)) {
        echo "Error en la inserción de 'car_servicios': " . mysqli_error($con);
        exit;
      }
    }
    mysqli_stmt_close($stmt);
  } else {
    echo "Error en la preparación de 'car_servicios': " . mysqli_error($con);
    exit;
  }

  if ($flag) {
    echo 1;
  } else {
    echo 0;
  }
}

if (isset($_POST['get_all_cars'])) {
  $res = select("SELECT * FROM `cars` WHERE `removed`=?",[0],'i');
  $i = 1;

  $data = "";

  while ($row = mysqli_fetch_assoc($res)) {
    if ($row['status'] == 1) {
      $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Activo</button>          
      ";
    } else {
      $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>Ocupado</button>
      ";
    }

    $data .= "
    <tr class='align-middle'>
      <td>$i</td>
      <td>$row[name]</td>
      <td>$row[marca]</td>
      <td>
       <span class='badge rounded-pill bg-light text-dark'>
         Pasajeros: $row[pasajeros]
       </span>
      </td>
      <td>$ $row[price]</td>
      <td>$row[placa]</td>
      <td>$status</td>
      <td>
          <button type='button' onclick ='edit_details($row[id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-car'>
                <i class='bi bi-pencil-square'></i>
          </button>
          <button type='button' onclick =\"room_images($row[id],'$row[name]')\" class='btn btn-info shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'>
                <i class='bi bi-images'></i>
          </button>
          <button type='button' onclick ='remove_room($row[id])' class='btn btn-danger shadow-none btn-sm'>
                <i class='bi bi-trash'></i>
          </button>
      </td>
    </tr>    
 ";
    $i++;
  }
  echo $data;
}

if (isset($_POST['toggle_status'])) {
  $frm_data = filteration($_POST);

  $q = "UPDATE `cars` SET `status`= ? WHERE `id` = ?";
  $v = [$frm_data['value'], $frm_data['toggle_status']];

  if (update($q, $v, 'ii')) {
    echo 1;
  } else {
    echo 0;
  }
}

if (isset($_POST['get_cars'])) {
  $frm_data = filteration($_POST);

  $res1 = select("SELECT * FROM `cars` WHERE `id`=?", [$frm_data['get_cars']], 'i');
  $res2 = select("SELECT * FROM `car_servicios` WHERE `car_id`=?", [$frm_data['get_cars']], 'i');
  $res3 = select("SELECT * FROM `cars_facilities` WHERE `car_id`=?", [$frm_data['get_cars']], 'i');

  $roomdata = mysqli_fetch_assoc($res1);
  $servicios = [];
  $facilities = [];
  if (mysqli_num_rows($res2) > 0) {
    while ($row = mysqli_fetch_assoc($res2)) {
      array_push($servicios, $row['servicios_id']);
    }
  }

  if (mysqli_num_rows($res3) > 0) {
    while ($row = mysqli_fetch_assoc($res3)) {
      array_push($facilities, $row['facilities_id']);
    }
  }
  $data = ["roomdata" => $roomdata, "servicios" => $servicios, "facilities" => $facilities];
  $data = json_encode($data);
  echo $data;
}

if (isset($_POST['edit_car'])) {
  $servicios = json_decode($_POST['servicios'], true);
  $facilities = json_decode($_POST['facilities'], true);

  $frm_data = filter_input_array(INPUT_POST, [
    'name' => FILTER_SANITIZE_SPECIAL_CHARS,
    'marca' => FILTER_SANITIZE_SPECIAL_CHARS,
    'price' => FILTER_VALIDATE_INT,
    'placa' => FILTER_SANITIZE_SPECIAL_CHARS,
    'passenger' => FILTER_VALIDATE_INT,
    'desc' => FILTER_SANITIZE_SPECIAL_CHARS,
    'car_id' => FILTER_VALIDATE_INT
  ]);

  if (!$frm_data) {
    echo "Invalid input";
    exit;
  }

  $flag = 0;

  // Actualizar datos del carro
  $q1 = "UPDATE `cars` SET `name`=?, `marca`=?, `price`=?, `placa`=?, `pasajeros`=?, `description`=? WHERE `id`=?";
  $values = [$frm_data['name'], $frm_data['marca'], $frm_data['price'], $frm_data['placa'], $frm_data['passenger'], $frm_data['desc'], $frm_data['car_id']];

  if (update($q1, $values, 'ssisisi')) {
    $flag = 1;
  } else {
    echo "Error en la actualización de 'cars': " . mysqli_error($con);
    exit;
  }

  // Eliminar servicios y facilities existentes
  $del_features = delete("DELETE FROM `car_servicios` WHERE `car_id`=?", [$frm_data['car_id']], 'i');
  $del_facilities = delete("DELETE FROM `cars_facilities` WHERE `car_id`=?", [$frm_data['car_id']], 'i');

  if (!($del_facilities && $del_features)) {
    echo "Error en la eliminación de 'car_servicios' o 'cars_facilities': " . mysqli_error($con);
    exit;
  }

  // Insertar nuevos facilities
  $q2 = "INSERT INTO `cars_facilities`(`car_id`, `facilities_id`) VALUES (?,?)";
  $stmt_facilities = mysqli_prepare($con, $q2);

  if ($stmt_facilities) {
    foreach ($facilities as $f) {
      mysqli_stmt_bind_param($stmt_facilities, 'ii', $frm_data['car_id'], $f);
      if (!mysqli_stmt_execute($stmt_facilities)) {
        echo "Error en la inserción de 'cars_facilities': " . mysqli_error($con);
        exit;
      }
    }
    mysqli_stmt_close($stmt_facilities);
  } else {
    echo "Error en la preparación de 'cars_facilities': " . mysqli_error($con);
    exit;
  }

  // Insertar nuevos servicios
  $q3 = "INSERT INTO `car_servicios`(`car_id`, `servicios_id`) VALUES (?,?)";
  $stmt_servicios = mysqli_prepare($con, $q3);

  if ($stmt_servicios) {
    foreach ($servicios as $s) {
      mysqli_stmt_bind_param($stmt_servicios, 'ii', $frm_data['car_id'], $s);
      if (!mysqli_stmt_execute($stmt_servicios)) {
        echo "Error en la inserción de 'car_servicios': " . mysqli_error($con);
        exit;
      }
    }
    mysqli_stmt_close($stmt_servicios);
  } else {
    echo "Error en la preparación de 'car_servicios': " . mysqli_error($con);
    exit;
  }

  if ($flag) {
    echo 1;
  } else {
    echo 0;
  }
}

if (isset($_POST['add_image'])) {
  $frm_data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $img_r = uploadImage($_FILES['image'], CARS_FOLDER);

    if ($img_r == 'inv_img') {
      echo $img_r;
    } else if ($img_r == 'inv_size') {
      echo $img_r;
    } else if ($img_r == 'upd_failed') {
      echo $img_r;
    } else {
      $q = "INSERT INTO `car_image`(`car_id`, `image`) VALUES (?,?)";
      $values = [$frm_data['room_id'], $img_r];
      $res = insert($q, $values, 'is');
      echo $res;
    }
  } else {
    echo 'Error al cargar la imagen';
  }
}

if (isset($_POST['get_image_rooms'])) {
  $frm_data = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $res = select("SELECT * FROM `car_image` WHERE `car_id`=?", [$frm_data['get_image_rooms']], 'i');

  $path = ROOMS_IMG_PATH;

  while ($row = mysqli_fetch_assoc($res)) {

    if ($row['thumb']==1) {
      $thumb_btn = "<i class='bi bi-check-square text-light bg-success px-2 py-1 rounded fs-5'></i>"; 

    }else {
      $thumb_btn = "<button onclick ='thumb_image($row[sr_no],$row[car_id])' class='btn btn-secondary shadow-none btn-sm'>
                     <i class='bi bi-check-lg'></i>
                    </button>";
    }

    echo <<<data
       <tr class='align-middle'>
        <td><img src='$path{$row['image']}' class='img-fluid'></td>
        <td>$thumb_btn</td>
        <td>
           <button onclick ='rem_image($row[sr_no],$row[car_id])' class='btn btn-danger shadow-none btn-sm'>
                <i class='bi bi-trash'></i>
          </button>
        </td>
       </tr>
    data;
  }
}

if (isset($_POST['rem_image'])) {
  $frm_data = filteration($_POST);
  $values = [$frm_data['image_id'], $frm_data['room_id']];
  $pre_q = "SELECT * FROM `car_image` WHERE `sr_no` = ? AND `car_id`=?";
  $res = select($pre_q, $values, 'ii'); 
  $img = mysqli_fetch_assoc($res);

  if ($img && deleteImage($img['image'], CARS_FOLDER)) {
    $q = "DELETE FROM `car_image` WHERE `sr_no` = ? AND `car_id`=?";
    $res = delete($q, $values, 'ii');
    echo $res;
  } else {
    echo 0;
  }
}

if (isset($_POST['thumb_image'])) {
  $frm_data = filteration($_POST);
  
  $pre_q = "UPDATE `car_image` SET `thumb`= ? WHERE `car_id`=?";
  $pre_v = [0,$frm_data['room_id']];
  $pre_res = update($pre_q,$pre_v,'ii');

  $q = "UPDATE `car_image` SET `thumb`= ? WHERE `sr_no`=? AND `car_id`=?";
  $v = [1,$frm_data['image_id'],$frm_data['room_id']];
  $res = update($q,$v,'iii');

  echo $res;
}

if (isset($_POST['remove_room'])) {
  $frm_data = filteration($_POST);
  
  $res1 = select("SELECT * FROM `car_image` WHERE `car_id`=?",[$frm_data['room_id']], 'i');

  while ($row = mysqli_fetch_assoc($res1)) {
    deleteImage($row['image'], CARS_FOLDER);
  }
  $res2 = delete("DELETE FROM `car_image` WHERE `car_id`=?", [$frm_data['room_id']],'i');
  $res3 = delete("DELETE FROM `car_servicios` WHERE `car_id`=?", [$frm_data['room_id']],'i');
  $res4 = delete("DELETE FROM `cars_facilities` WHERE `car_id`=?", [$frm_data['room_id']],'i');
  $res5 = update("UPDATE `cars` SET `removed`= ? WHERE `id`=?", [1,$frm_data['room_id']],'ii');
  if ($res2 || $res3 || $res4 || $res5) {
    echo 1;
  }else{
    echo 0;
  }
}