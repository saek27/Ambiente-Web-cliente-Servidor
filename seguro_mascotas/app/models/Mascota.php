<?php
require_once __DIR__ . '/../../config/Database.php';

class Mascota extends Database {
    public function crear($nombre, $raza, $fecha_nacimiento, $cliente_id) {
        $conn = self::connect();
        $stmt = $conn->prepare("INSERT INTO mascota (nombre, raza, fecha_nacimiento, cliente_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nombre, $raza, $fecha_nacimiento, $cliente_id]);
    }

    public function obtenerPorCliente($cliente_id) {
        $conn = self::connect();
        $stmt = $conn->prepare("SELECT * FROM mascota WHERE cliente_id = ?");
        $stmt->execute([$cliente_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
