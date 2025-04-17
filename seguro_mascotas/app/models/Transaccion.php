<?php
require_once __DIR__ . '/../../config/Database.php';

class Transaccion extends Database {
    /**
     * Crea una nueva transacción
     * 
     * @param int $cliente_id
     * @param int $plan_id
     * @param float $monto
     * @param int $metodo_pago_id
     * @param string $detalles (JSON con datos adicionales)
     * @param string $estado ('completado', 'pendiente', 'fallido')
     * @return int|false
     */
    public function crear($cliente_id, $plan_id, $monto, $metodo_pago_id, $detalles, $estado = 'pendiente') {
        $conn = self::connect();
        
        try {
            $stmt = $conn->prepare("
                INSERT INTO transacciones 
                (cliente_id, plan_id, monto, metodo_pago_id, estado, detalles, fecha) 
                VALUES (?, ?, ?, ?, ?, ?, NOW())
            ");
            
            $stmt->execute([
                $cliente_id,
                $plan_id,
                $monto,
                $metodo_pago_id,
                $estado,
                $detalles
            ]);
            
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error en Transaccion::crear: " . $e->getMessage());
            return false;
        }
    }
    public function tienePlanActivo($cliente_id) {
        $conn = self::connect();
        $stmt = $conn->prepare("
            SELECT COUNT(*) 
            FROM transacciones 
            WHERE cliente_id = ? AND estado = 'completado'
        ");
        $stmt->execute([$cliente_id]);
        return $stmt->fetchColumn() > 0;
    }
    public function obtenerPlanActivo($cliente_id) {
        $conn = self::connect();
        $stmt = $conn->prepare("
            SELECT * FROM transacciones 
            WHERE cliente_id = ? 
            AND estado = 'completado' 
            ORDER BY fecha DESC 
            LIMIT 1
        ");
        $stmt->execute([$cliente_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function cancelarPlanActivo($cliente_id) {
        $conn = self::connect();
        $stmt = $conn->prepare("UPDATE transacciones SET estado = 'cancelado' WHERE cliente_id = ? AND estado = 'completado'");
        $stmt->execute([$cliente_id]);
    }
    
    
    
}
