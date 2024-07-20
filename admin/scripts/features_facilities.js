
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
