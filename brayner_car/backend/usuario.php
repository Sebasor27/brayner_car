<?php
class Usuario {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function insertarUsuario($nombre, $apellido, $cedula, $celular, $correo, $usuario, $contraseña, $tipo, $licencia) {
        $stmt = $this->conn->prepare("INSERT INTO usuario (nombre, apellido, cedula, celular, correo, usuario, contraseña, tipo, licencia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssssssss", $nombre, $apellido, $cedula, $celular, $correo, $usuario, $contraseña, $tipo, $licencia);
            
            if ($stmt->execute()) {
                echo "Nuevo registro creado con éxito";
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $this->conn->error;
        }
    }
}
?>

