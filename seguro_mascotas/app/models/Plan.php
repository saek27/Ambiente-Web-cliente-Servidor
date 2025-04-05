<?php
require_once 'Database.php';

class Plan extends Database {
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM planes");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function create($nombre, $descripcion, $precio) {
        $stmt = $this->conn->prepare("INSERT INTO planes (nombre, descripcion, precio) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $nombre, $descripcion, $precio);
        return $stmt->execute();
    }
}
?>