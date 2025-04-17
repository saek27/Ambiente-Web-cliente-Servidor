<?php
// seguro_mascotas/app/controllers/PlanController.php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/Plan.php';

class PlanController {
    
    public function getAllPlanes() {
        $plan = new Plan();
        return $plan->getAll();
    }

    public function contratar() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        
        // Validar sesión
        if (!isset($_SESSION['cliente_id'])) {
            $_SESSION['error'] = "Debe iniciar sesión";
            header("Location: /seguro_mascotas/index.php?action=login");
            exit;
        }

        // Validar parámetro
        if (!isset($_POST['plan_id'])) {
            $_SESSION['error'] = "Plan no especificado";
            header("Location: /seguro_mascotas/planes");
            exit;
        }

        // Redirigir a formulario de pago
        header("Location: /seguro_mascotas/index.php?action=mostrar_pago&plan_id=" . $_POST['plan_id']);
        exit;
    }
    public function mostrarCancelarPlan() {
        if (session_status() === PHP_SESSION_NONE) session_start();
    
        $cliente_id = $_SESSION['cliente_id'];
    
        $transaccion = new Transaccion();
        $planActivo = $transaccion->obtenerPlanActivo($cliente_id);
    
        require __DIR__ . '/../views/pagos/cancelar.php';   // ✅

    }
    
    public function cancelarPlan() {
        if (session_status() === PHP_SESSION_NONE) session_start();
    
        $cliente_id = $_SESSION['cliente_id'];
    
        $transaccion = new Transaccion();
        $transaccion->cancelarPlanActivo($cliente_id);
    
        $_SESSION['mensaje_cancelacion'] = "Tu plan ha sido cancelado correctamente.";
        header("Location: /seguro_mascotas/index.php?action=planes");
    }
    
}
?>