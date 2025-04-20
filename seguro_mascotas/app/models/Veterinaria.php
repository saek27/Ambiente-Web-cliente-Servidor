<?php
require_once __DIR__ . '/../../config/Database.php';

class Veterinaria extends Database {
    public function obtenerTodas() {
        $conn = self::connect();
        $stmt = $conn->query("SELECT * FROM veterinaria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
