<?php
require_once 'Database.php';

class Contacto {
    private $conn;
    
    // Constructor que inicializa la conexión a la base de datos
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }
    // Método para agregar un nuevo contacto
    public function add ($nombre, $apellido, $telefono, $email, $empresa, $direccion) {
        $sql = 'INSERT INTO contactos (nombre, apellido, telefono, email, empresa, direccion) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nombre, $apellido, $telefono, $email, $empresa, $direccion]);
    }

    // Método para obtener todos los contactos
    public function getContacts (){
        $sql = 'SELECT * FROM contactos ORDER BY id ASC';
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un contacto por ID
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM contactos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un contacto existente
    public function actualizar($id, $nombre, $apellido, $telefono, $email, $empresa, $direccion) {
        $sql = "UPDATE contactos SET nombre = ?, apellido = ?, telefono = ?, email = ?, empresa = ?, direccion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nombre, $apellido, $telefono, $email, $empresa, $direccion, $id]);
    }

    // Método para eliminar un contacto por su ID
    public function eliminar($id) {
        $sql = "DELETE FROM contactos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

}
?>