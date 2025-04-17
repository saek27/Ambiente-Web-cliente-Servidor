<?php include __DIR__ . '/../header.php'; ?>
<?php $base_url = '/seguro_mascotas'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?= $base_url ?>/public/assets/css/styles.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SweetAlert2 (si lo usás) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h2 class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>Cancelar Plan</h2>
                </div>
                <div class="card-body">
                    <?php if ($planActivo): ?>
                        <p class="lead">Estás suscrito al plan <strong>ID: <?= $planActivo['plan_id'] ?></strong>, con un pago de ₡<?= number_format($planActivo['monto'], 2) ?>.</p>
                        <form action="<?= $base_url ?>/index.php?action=confirmar_cancelacion" method="POST">
                            <button class="btn btn-danger btn-lg mt-3">Confirmar Cancelación</button>
                        </form>
                    <?php else: ?>
                        <p class="text-muted">No tienes un plan activo actualmente.</p>
                        <a href="<?= $base_url ?>/index.php?action=planes" class="btn btn-secondary mt-3">Ver Planes</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include __DIR__ . '/../footer.php'; ?>
