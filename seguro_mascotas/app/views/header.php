<?php
require_once __DIR__ . '/../../config/database.php';

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
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-primary text-white p-4 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">PetSeguro</h1>
            <nav>
                <a href="/Ambiente-Web-cliente-Servidor/seguro_mascotas/" class="text-white me-3 text-decoration-none">Inicio</a>
                <a href="/planes" class="text-white text-decoration-none">Planes</a>
            </nav>
        </div>
    </header>
