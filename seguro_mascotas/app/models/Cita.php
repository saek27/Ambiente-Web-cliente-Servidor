<?php
require_once __DIR__ . '/../../config/Database.php';

class Cita extends Database {
    public function programar($mascota_id, $veterinaria_id, $fecha, $motivo) {
        $conn = self::connect();
        $stmt = $conn->prepare("
            INSERT INTO servicio_veterinario (fecha_servicio, tipo, descripcion, costo, mascota_id, veterinaria_id)
            VALUES (?, 'Consulta', ?, 0.00, ?, ?)
        ");
        return $stmt->execute([$fecha, $motivo, $mascota_id, $veterinaria_id]);
    }
}
