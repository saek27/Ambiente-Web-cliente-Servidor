<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['cliente_id'])) {
    echo json_encode(['success' => false, 'message' => 'No ha iniciado sesión.']);
    exit;
}

$cliente_id = $_SESSION['cliente_id'];
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['plan_id'])) {
    echo json_encode(['success' => false, 'message' => 'ID de plan faltante.']);
    exit;
}

$plan_id = intval($data['plan_id']);
$fecha_inicio = date('Y-m-d');
$fecha_final = date('Y-m-d', strtotime('+1 year'));
$estado_pago = 'Pendiente'; // Puedes cambiar esto si tienes integración de pagos

// Requiere conexión a la base de datos
require_once __DIR__ . '/../../config/Database.php';

// Opción: Seleccionar la primera mascota del cliente
$sql_mascota = "SELECT id_mascota FROM mascota WHERE cliente_id = ? LIMIT 1";
$stmt = $conn->prepare($sql_mascota);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'No se encontró una mascota asociada.']);
    exit;
}

$mascota_id = $result->fetch_assoc()['id_mascota'];

$sql = "INSERT INTO poliza (fecha_inicio, fecha_final, estado_pago, cliente_id, mascota_id, plan_id)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssiii", $fecha_inicio, $fecha_final, $estado_pago, $cliente_id, $mascota_id, $plan_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $stmt->error]);
}

$stmt->close();
$conn->close();
