<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetSeguro</title>
    <link rel="stylesheet" href="/public/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <header class="bg-primary text-white py-3">
        <div class="container">
            <nav class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">PetSeguro</h1>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/planes">Planes</a></li>
                    <?php if(isset($_SESSION['user'])): ?>
                        <li class="nav-item"><a class="nav-link text-white" href="/mascotas">Mascotas</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>