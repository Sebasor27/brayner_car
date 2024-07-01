function toggleLicenseField() {
    var tipo = document.getElementById("tipo").value;
    var licenciaField = document.getElementById("licencia");

    if (tipo === "chofer") {
        licenciaField.removeAttribute("disabled");
        licenciaField.setAttribute("required", "true");
    } else {
        licenciaField.setAttribute("disabled", "true");
        licenciaField.removeAttribute("required");
        licenciaField.value = ""; 
    }
}
function submitForm() {
    alert("Usuario ingresado correctamente!");
     // permite que el formulario se envíe

    document.getElementById("nombre").value = "";
    document.getElementById("apellido").value = "";
    document.getElementById("cedula").value = "";
    document.getElementById("celular").value = "";
    document.getElementById("correo").value = "";
    document.getElementById("usuario").value = "";
    document.getElementById("contraseña").value = "";
    document.getElementById("licencia").value = "";
  
    return false;  
}