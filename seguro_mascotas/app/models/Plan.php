<?php
require_once __DIR__ . '/../../config/Database.php';  // Desde models/

class Plan extends Database {
    public function getAll() {
        $conn = self::connect(); // Usa el método estático de Database
        $stmt = $conn->query("SELECT id_plan, nombre, precio_mensual AS precio, cobertura AS descripcion FROM plan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // fetchAll para PDO
    }

    public function create($nombre, $descripcion, $precio) {
        $conn = self::connect();
        $stmt = $conn->prepare("INSERT INTO plan (nombre, cobertura, precio_mensual) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $descripcion, $precio]); // PDO usa execute(array)
    }

    public function getById($plan_id) {
        $conn = self::connect();
        $stmt = $conn->prepare("SELECT * FROM plan WHERE id_plan = ?");
        $stmt->execute([$plan_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>