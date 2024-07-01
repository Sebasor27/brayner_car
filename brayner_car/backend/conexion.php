<?php
$servername = "localhost";
$username = "root";
$password = "sebas27";
$dbname = "brayner_car";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
$conn->close();
?>