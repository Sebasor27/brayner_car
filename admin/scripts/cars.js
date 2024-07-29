let add_car_form = document.getElementById("add_car_form");

add_car_form.addEventListener("submit", function (e) {
  e.preventDefault();
  add_cars();
});

function add_cars() {
  let data = new FormData(add_car_form);
  data.append("add_car", "");

  let servicios = [];
  add_car_form.elements["servicios"].forEach((el) => {
    if (el.checked) {
      servicios.push(el.value);
    }
  });

  let facilities = [];
  add_car_form.elements["facilities"].forEach((el) => {
    if (el.checked) {
      facilities.push(el.value);
    }
  });

  data.append("servicios", JSON.stringify(servicios));
  data.append("facilities", JSON.stringify(facilities));

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);

  xhr.onload = function () {
    console.log(this.responseText);
    var myModal = document.getElementById("add-car");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 1) {
      alert("success", "Nuevo carro añadido");
      add_car_form.reset();
      get_all_cars();
    } else {
      alert("error", "Servidor caido: " + this.responseText);
    }
  };

  xhr.onerror = function () {
    console.error("Error de conexión");
  };

  xhr.send(data);
}

function get_all_cars() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("car-data").innerHTML = this.responseText;
  };

  xhr.onerror = function () {
    console.error("Error de conexión");
  };

  xhr.send("get_all_cars");
}

let edit_car_form = document.getElementById("edit_car_form");

edit_car_form.addEventListener("submit", function (e) {
  e.preventDefault();
  submit_edit_cars();
});

function edit_details(id) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    let data = JSON.parse(this.responseText);
    edit_car_form.elements["name"].value = data.roomdata.name;
    edit_car_form.elements["marca"].value = data.roomdata.marca;
    edit_car_form.elements["price"].value = data.roomdata.price;
    edit_car_form.elements["passenger"].value = data.roomdata.pasajeros;
    edit_car_form.elements["placa"].value = data.roomdata.placa;
    edit_car_form.elements["desc"].value = data.roomdata.description;
    edit_car_form.elements["car_id"].value = data.roomdata.id;

    edit_car_form.elements["servicios"].forEach((el) => {
      el.checked = data.servicios.includes(Number(el.value));
    });

    edit_car_form.elements["facilities"].forEach((el) => {
      el.checked = data.facilities.includes(Number(el.value));
    });
  };

  xhr.onerror = function () {
    console.error("Error de conexión");
  };

  xhr.send("get_cars=" + id);
}

function submit_edit_cars() {
  let data = new FormData(edit_car_form);
  data.append("edit_car", "");
  data.append("car_id", edit_car_form.elements["car_id"].value);
  let servicios = [];
  edit_car_form.elements["servicios"].forEach((el) => {
    if (el.checked) {
      servicios.push(el.value);
    }
  });

  let facilities = [];
  edit_car_form.elements["facilities"].forEach((el) => {
    if (el.checked) {
      facilities.push(el.value);
    }
  });

  data.append("servicios", JSON.stringify(servicios));
  data.append("facilities", JSON.stringify(facilities));

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);

  xhr.onload = function () {
    console.log(this.responseText);
    var myModal = document.getElementById("edit-car");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 1) {
      alert("success", "Carro editado exitosamente");
      edit_car_form.reset();
      get_all_cars();
    } else {
      alert("error", "Servidor caido: " + this.responseText);
    }
  };

  xhr.onerror = function () {
    console.error("Error de conexión");
  };

  xhr.send(data);
}

function toggle_status(id, val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Estado cambiado");
      get_all_cars();
    } else {
      alert("error", "Servidor caido: " + this.responseText);
    }
  };

  xhr.onerror = function () {
    console.error("Error de conexión");
  };

  xhr.send("toggle_status=" + id + "&value=" + val);
}

let add_image_form = document.getElementById("add_image_form");
add_image_form.addEventListener("submit", function (e) {
  e.preventDefault();
  add_image();
});

function add_image() {
  let data = new FormData();
  data.append("image", add_image_form.elements["image"].files[0]);
  data.append("room_id", add_image_form.elements["room_id"].value);

  data.append("add_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);

  xhr.onload = function () {
    if (this.responseText == "inv_img") {
      alert("error", "Solo en formato JPG y PNG");
    } else if (this.responseText == "inv_size") {
      alert("error", "Tamaño aceptable es de 2mb");
    } else if (this.responseText == "upd_failed") {
      alert("error", "Imagen no se pudo cargar. Servidor caido!!");
    } else {
      alert("success", "Nueva imagen añadido", "image-alert");
      room_images(
        add_image_form.elements["room_id"].document.querySelector(
          "#room-images .modal-title"
        ).innerText
      );

      add_image_form.reset();
    }
  };

  xhr.send(data);
}

function room_images(id, rname) {
  document.querySelector("#room-images .modal-title").innerText = rname;
  add_image_form.elements["room_id"].value = id;

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("room-image-data").innerHTML = this.responseText;
  };

  xhr.onerror = function () {
    console.error("Error de conexión");
  };

  xhr.send("get_image_rooms=" + id);
}

function rem_image(img_id, room_id) {
  let data = new FormData();
  data.append("image_id", img_id);
  data.append("room_id", room_id);

  data.append("rem_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "imagen eliminada");
      room_images(
        room_id,
        document.querySelector("#room-images .modal-title").innerText
      );
    } else {
      alert("error", "No se removio", "image-alert");
    }
  };

  xhr.send(data);
}

function thumb_image(img_id, room_id) {
  let data = new FormData();
  data.append("image_id", img_id);
  data.append("room_id", room_id);

  data.append("thumb_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/rooms.php", true);

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "imagen aceptada");
      room_images(
        room_id,
        document.querySelector("#room-images .modal-title").innerText
      );
    } else {
      alert("error", "No se acepto", "image-alert");
    }
  };

  xhr.send(data);
}

function remove_room(room_id) {
  if (confirm("Estas seguro que quieres eliminar este carro?")) {
    let data = new FormData();
    data.append("room_id", room_id);
    data.append("remove_room", "");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);

    xhr.onload = function () {
      if (this.responseText == 1) {
        alert("success", "Carro Eliminado");
        get_all_cars();
      } else {
        alert("error", "No se pudo eliminar:(");
      }
    };

    xhr.send(data);
  }
}

window.onload = function () {
  get_all_cars();
};
