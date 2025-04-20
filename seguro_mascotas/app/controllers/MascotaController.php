<?php
require_once __DIR__ . '/../models/Mascota.php';

class MascotaController {
    public function registrarMascota() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $mascota = new Mascota();

            $result = $mascota->crear(
                $_POST['nombre'],
                $_POST['raza'],
                $_POST['fecha_nacimiento'],
                $_SESSION['cliente_id']
            );

            if ($result) {
                header("Location: /seguro_mascotas/index.php?action=mascotas&success=1");
            } else {
                header("Location: /seguro_mascotas/index.php?action=mascotas&error=1");
            }
        }
    }

    public function mostrarMascotas() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['cliente_id'])) {
            $_SESSION['mensaje_login'] = "Por favor, inicia sesión o regístrate para ver tus mascotas.";
            header("Location: /seguro_mascotas/index.php?action=login");
            exit;
        }
    
        $mascota = new Mascota();
        $lista = $mascota->obtenerPorCliente($_SESSION['cliente_id']);
        require __DIR__ . '/../views/mascotas/index.php';
    }
    
}

