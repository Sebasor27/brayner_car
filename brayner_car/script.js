function toggleLicenseField() {
    function toggleLicenseField() {
        var tipo = document.getElementById("tipo").value;
        var licenciaField = document.getElementById("licencia");

        if (tipo === "chofer") {
            licenciaField.removeAttribute("disabled");
            licenciaField.setAttribute("required", "true");
        } else {
            licenciaField.setAttribute("disabled", "true");
            licenciaField.removeAttribute("required");
            licenciaField.value = ""; // Limpiar el valor si se deshabilita
    
        }
    }
}