<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../app/controllers/PlanController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = Database::connect();

if ($conn) {
    echo "<div style='background: #d4edda; color: #155724; padding: 10px; text-align:center;'>✅ Conectado correctamente a la base de datos.</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PetSeguro</title>
    <link rel="stylesheet" href="/seguro_mascotas/public/assets/css/contacto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-primary text-white p-4 mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-0">PetSeguro</h1>

        <nav class="d-flex align-items-center gap-2">
            <?php $base_url = "/seguro_mascotas"; ?>

            <a href="<?= $base_url ?>/index.php?action=inicio" class="btn text-white text-decoration-none">Inicio</a>
            <a href="<?= $base_url ?>/index.php?action=planes" class="btn text-white text-decoration-none">Planes</a>
            <a href="<?= $base_url ?>/index.php?action=mascotas" class="btn text-white text-decoration-none">Mis Mascotas</a>
            <a href="<?= $base_url ?>/index.php?action=agendar_cita" class="btn text-white text-decoration-none">Agendar Cita</a>
            <a href="<?= $base_url ?>/app/views/historia.php" class="btn text-white text-decoration-none">Nosotros</a>

            <?php if (isset($_SESSION['cliente'])): ?>
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownPerfil" data-bs-toggle="dropdown">
            👤 <?= htmlspecialchars($_SESSION['cliente']['nombre']) ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?= $base_url ?>/index.php?action=perfil">Mis datos</a></li>
            <li><a class="dropdown-item" href="#">Historial de pagos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="<?= $base_url ?>/index.php?action=logout">Cerrar sesión</a></li>
        </ul>
    </div>
<?php else: ?>
    <a href="<?= $base_url ?>/index.php?action=login" class="btn btn-outline-light">Iniciar sesión</a>
<?php endif; ?>
        </nav>
    </div>
</header>

<!-- Bootstrap JS (para dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
