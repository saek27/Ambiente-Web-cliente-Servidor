<?php
require_once '../models/Mascota.php';

class MascotaController {
    public function registrarMascota() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mascota = new Mascota();
            $result = $mascota->crear(
                $_POST['nombre'],
                $_POST['especie'],
                $_POST['raza'],
                $_POST['edad'],
                $_SESSION['user']['id']
            );
            
            if ($result) {
                header("Location: /mascotas?success=1");
            } else {
                header("Location: /mascotas?error=1");
            }
        }
    }
}
?>