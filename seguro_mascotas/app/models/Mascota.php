<?php
class Mascota extends Database {
    public function crear($nombre, $especie, $raza, $edad, $usuario_id) {
        $stmt = $this->conn->prepare("INSERT INTO mascotas (nombre, especie, raza, edad, usuario_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $nombre, $especie, $raza, $edad, $usuario_id);
        return $stmt->execute();
    }

    public function obtenerPorUsuario($usuario_id) {
        $stmt = $this->conn->prepare("SELECT * FROM mascotas WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>