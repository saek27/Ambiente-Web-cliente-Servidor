<?php
require_once __DIR__ . '/../models/Cita.php';

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
                header("Location: /seguro_mascotas/index.php?action=agendar_cita&success=1");
            } else {
                header("Location: /seguro_mascotas/index.php?action=agendar_cita&error=1");
            }
        }
    }

    public function formulario() {
        if (session_status() === PHP_SESSION_NONE) session_start();

        require_once __DIR__ . '/../models/Mascota.php';
        require_once __DIR__ . '/../models/Veterinaria.php';

        $mascota = new Mascota();
        $veterinaria = new Veterinaria();

        $misMascotas = $mascota->obtenerPorCliente($_SESSION['cliente_id']);
        $veterinarias = $veterinaria->obtenerTodas();

        require __DIR__ . '/../views/citas/agendar.php';
    }
}
