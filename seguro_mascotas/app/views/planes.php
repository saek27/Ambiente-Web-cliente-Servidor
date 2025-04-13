<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetSeguro - Nuestros Planes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/seguro_mascotas/public/assets/css/styles.css">
    <!-- Iconos de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos personalizados adicionales */
        .plan-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .plan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .plan-header {
            background: linear-gradient(135deg, #3498db, #2c3e50);
            color: white;
        }
        .price {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .benefit-item {
            border-left: 3px solid #3498db;
            padding-left: 10px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

<?php
$planController = new PlanController();
$planes = $planController->getAllPlanes();
?>

<main class="py-5">
    <div class="container">
        <!-- Hero Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-3">🐾 Nuestros Planes de Protección</h1>
                <p class="lead text-muted">Elige el plan perfecto para el cuidado integral de tu mascota</p>
            </div>
        </div>

        <!-- Planes -->
        <div class="row g-4">
            <?php foreach ($planes as $plan): ?>
            <div class="col-md-4">
                <div class="plan-card card h-100 shadow">
                    <!-- Encabezado del Plan -->
                    <div class="plan-header card-header py-4">
                        <h3 class="h2 text-center mb-0"><?= htmlspecialchars($plan['nombre']) ?></h3>
                    </div>
                    
                    <!-- Cuerpo del Plan -->
                    <div class="card-body p-4">
                        <!-- Precio -->
                        <div class="text-center my-4">
                            <span class="price text-primary">₡<?= number_format($plan['precio'], 2) ?></span>
                            <span class="text-muted">/mes</span>
                        </div>
                        
                        <!-- Beneficios -->
                        <ul class="list-unstyled mb-4">
                            <?php 
                            // Dividimos la descripción por puntos
                            $beneficios = preg_split('/\n|\r\n?|•/', $plan['descripcion']);
                            foreach ($beneficios as $beneficio):
                                if(trim($beneficio) != ''):
                            ?>
                            <li class="benefit-item py-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <?= htmlspecialchars(trim($beneficio)) ?>
                            </li>
                            <?php 
                                endif;
                            endforeach; 
                            ?>
                        </ul>
                    </div>
                    
                    <!-- Pie del Plan -->
                    <div class="card-footer bg-transparent border-0 py-3">
                        <a href="#" class="btn btn-primary btn-lg w-100 py-3">
                            Contratar Ahora <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Sección adicional -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="p-4 bg-light rounded-3">
                    <h3 class="h4 mb-3">¿Necesitas ayuda para elegir?</h3>
                    <a href="/seguro_mascotas/contacto" class="btn btn-outline-primary">
                        <i class="fas fa-phone-alt me-2"></i> Contáctanos
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php include 'footer.php'; ?>