<?php
// seguro_mascotas/app/controllers/PaymentController.php

require_once __DIR__ . '/../../config/Database.php';
require_once __DIR__ . '/../models/Plan.php';
require_once __DIR__ . '/../models/Transaccion.php';

class PaymentController {
    
    public function mostrarFormularioPago($plan_id) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        
        // Verificar sesión
        if (!isset($_SESSION['cliente_id'])) {
            header("Location: /seguro_mascotas/index.php?action=login");
            exit;
        }

        // Obtener datos del plan
        $planModel = new Plan();
        $plan = $planModel->getById($plan_id);
        
        // Obtener métodos de pago
        $metodos = $this->obtenerMetodosPago(); 

        // Cargar vista
        require __DIR__ . '/../views/pagos/formulario_pago.php';
    }

    public function procesarPago() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        
        try {
            // Validar datos
            $required = ['plan_id', 'monto', 'metodo_pago_id'];
            foreach ($required as $campo) {
                if (empty($_POST[$campo])) {
                    throw new Exception("Campo $campo requerido");
                }
            }
    
            // Guardar el monto en sesión para mostrarlo en la vista de éxito/error
            $_SESSION['pago_monto'] = $_POST['monto'];
    
            // Registrar transacción
            $transaccion = new Transaccion();
            if ($transaccion->tienePlanActivo($_SESSION['cliente_id'])) {
                throw new Exception("Ya tiene un plan activo. Debe cancelarlo antes de adquirir uno nuevo.");
            }
            $transaccionId = $transaccion->crear(
                $_SESSION['cliente_id'],
                $_POST['plan_id'],
                $_POST['monto'],
                $_POST['metodo_pago_id'],
                json_encode($_POST),
                'completado'  // 👈 Estado explícito
            );
    
            if ($transaccionId) {
                header("Location: /seguro_mascotas/index.php?action=pago_exitoso");
            } else {
                throw new Exception("No se pudo registrar la transacción");
            }
    
        } catch (Exception $e) {
            // Guardar mensaje de error para mostrarlo en la vista
            $_SESSION['error_pago'] = $e->getMessage();
    
            // (Opcional) Registrar transacción como fallida
            if (isset($_SESSION['cliente_id'])) {
                $transaccion = new Transaccion();
                $transaccion->crear(
                    $_SESSION['cliente_id'],
                    $_POST['plan_id'] ?? null,
                    $_POST['monto'] ?? 0,
                    $_POST['metodo_pago_id'] ?? 0,
                    json_encode(['error' => $e->getMessage()]),
                    'fallido'
                );
            }
    
            header("Location: /seguro_mascotas/index.php?action=pago_error");
        }
    }
    private function obtenerMetodosPago() {
        $conn = Database::connect();
        $stmt = $conn->query("SELECT * FROM metodos_pago");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>