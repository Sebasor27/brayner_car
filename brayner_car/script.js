function toggleLicenseField() {
    var userType = document.getElementById('tipo').value;
    var licenseField = document.getElementById('licencia');
    if (userType === 'chofer') {
        licenseField.disabled = false;
    } else {
        licenseField.disabled = true;
        licenseField.value = '';
    }
}