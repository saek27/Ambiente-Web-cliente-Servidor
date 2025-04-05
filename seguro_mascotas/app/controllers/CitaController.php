<?php
require_once '../models/Cita.php';

class CitaController {
    public function nuevaCita() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cita = new Cita();
            $result = $cita->programar(
                $_POST['mascota_id'],
                $_POST['veterinaria_id'],
                $_POST['fecha'],
                $_POST['motivo']
            );
            
            if ($result) {
                // Integrar con API de notificaciones
                header("Location: /citas?success=1");
            }
        }
    }
}
?>