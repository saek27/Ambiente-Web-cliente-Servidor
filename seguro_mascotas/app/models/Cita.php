<?php
class Cita extends Database {
    public function programar($mascota_id, $veterinaria_id, $fecha, $motivo) {
        $stmt = $this->conn->prepare("INSERT INTO citas (mascota_id, veterinaria_id, fecha, motivo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $mascota_id, $veterinaria_id, $fecha, $motivo);
        return $stmt->execute();
    }
}
?>