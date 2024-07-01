<?php
include 'conexion.php';
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña antes de almacenarla
$tipo = $_POST['tipo'];
$licencia = $_POST['licencia'];

// Preparar y ejecutar la consulta
$sql = "INSERT INTO usuario (nombre, apellido, cedula, celular, correo, usuario, contraseña, tipo, licencia) 
VALUES ('$nombre', '$apellido', '$cedula', '$celular', '$correo', '$usuario', '$contraseña', '$tipo', '$licencia')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

