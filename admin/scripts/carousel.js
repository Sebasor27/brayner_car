

let carousel_s_form = document.getElementById('carousel_s_form');
let carousel_picture_inp = document.getElementById('carousel_picture_inp');


carousel_s_form.addEventListener('submit', function(e) {
  e.preventDefault();
  add_image();
});

function add_image() {
  let data = new FormData();
  data.append('picture', carousel_picture_inp.files[0]);
  data.append('add_image', '');


  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/carousel_crud.php", true);

  xhr.onload = function() {
    console.log(this.responseText);
    var myModal = document.getElementById('carousel-s');
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 'inv_img') {
      alert('error', 'Solo en formato JPG y PNG');
    } else if (this.responseText == 'inv_size') {
      alert('error', 'Tamaño aceptable es de 2mb');
    } else if (this.responseText == 'upd_failed') {
      alert('error', 'Imagen no se pudo cargar. Servidor caido!!');
    } else {
      alert('success', 'Nueva imagen añadido');
      carousel_picture_inp.value = '';
      get_carousels();

    }
  }


  xhr.send(data);
}

function get_carousels(){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/carousel_crud.php", true);

  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function() {
    
    document.getElementById('carousel-data').innerHTML = this.responseText;
  }

  xhr.send("get_carousels");
}

function rem_carousel(val){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/carousel_crud.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (this.responseText==1) {
      alert('success','Imagen eliminada');
      get_carousels();
    }else{
      alert('error','Servidor caido');
    }
  }


  xhr.send("rem_carousel="+val);
}


window.onload = function() {
  get_carousels();
}
