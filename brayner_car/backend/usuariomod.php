<?php
// Incluir las clases
include 'conexion.php';
include 'Usuario.php';

// Crear instancia de la clase Conexion
$conexion = new Conexion();
$conn = $conexion->getConnection();

// Datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña antes de almacenarla
$tipo = $_POST['tipo'];
$licencia = $_POST['licencia'];

// Crear instancia de la clase Usuario y ejecutar la inserción
$usuarioObj = new Usuario($conn);
$usuarioObj->insertarUsuario($nombre, $apellido, $cedula, $celular, $correo, $usuario, $contraseña, $tipo, $licencia);

// Cerrar la conexión
$conexion->closeConnection();
?>