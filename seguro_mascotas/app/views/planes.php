<?php 
include 'header.php'; 
$base_url = '/seguro_mascotas';?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/assets/css/styles.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
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

<main class="py-5" style="background-image: url('public/img/fondo5.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-3" style="background-color: #ffffff;">🐾 Nuestros Planes de Protección</h1>
                <p class="lead text-muted">Elige el plan perfecto para el cuidado integral de tu mascota</p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($planes as $plan): ?>
            <div class="col-md-4">
                <div class="plan-card card h-100 shadow">
                    <div class="plan-header card-header py-4">
                        <h3 class="h2 text-center mb-0"><?= htmlspecialchars($plan['nombre']) ?></h3>
                    </div>

                    <div class="card-body p-4">
                        <div class="text-center my-4">
                            <span class="price text-primary">₡<?= number_format($plan['precio'], 2) ?></span>
                            <span class="text-muted">/mes</span>
                        </div>

                        <ul class="list-unstyled mb-4">
                            <?php 
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
                        <div class="card-footer bg-transparent border-0 py-3">
                        <form action="<?= $base_url ?>/index.php?action=contratar" method="POST">
        <input type="hidden" name="plan_id" value="<?= $plan['id_plan'] ?>">
        <button type="submit" class="btn btn-primary btn-lg w-100 py-3">
            Contratar Ahora <i class="fas fa-arrow-right ms-2"></i>
        </button>
    </form>
</div>
</div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="p-4 bg-light rounded-3">
                    <h3 class="h4 mb-3">¿Necesitas ayuda para elegir?</h3>
                    <a href="/seguro_mascotas/app/views/contacto.php" class="btn btn-outline-primary">
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
