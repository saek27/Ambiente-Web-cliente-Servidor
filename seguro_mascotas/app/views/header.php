<?php
require_once __DIR__ . '/../../config/database.php';
//include 'app/controllers/PlanController.php';
require_once __DIR__ . '/../../app/controllers/PlanController.php';
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
    <link rel="stylesheet" href="../../public/assets/css/contacto.css">

</head>
<body>
    <header class="bg-primary text-white p-4 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">PetSeguro</h1>
            <nav>
            <?php $base_url11 = "/seguro_mascotas"; ?>
            <a href="<?= $base_url11 ?>/index.php?action=inicio" class="btn text-white me-3 text-decoration-none">Inicio</a>
                <?php $base_url = "/seguro_mascotas"; ?>
            <a href="<?= $base_url ?>/index.php?action=planes" class="btn text-white me-3 text-decoration-none">Planes</a>
            <a href="/seguro_mascotas/app/views/historia.php" class="btn text-white me-3 text-decoration-none">Nosotros</a>
        
                <!-- /a href="</?= $base_url ?>/index.php?action=inicio" class="btn">Inicio</a> -->
            </nav>
        </div>
    </header>
