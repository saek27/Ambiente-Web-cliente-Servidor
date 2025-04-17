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
<body style="background-image: url('<?= $base_url ?>/public/img/fondo5.jpg'); background-size: cover;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0"><i class="fas fa-check-circle me-2"></i>¡Pago Exitoso!</h2>
                </div>
                
                <div class="card-body py-5">
                    <div class="display-1 text-success mb-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    
                    <h3 class="mb-4">Gracias por confiar en PetSeguro</h3>
                    <p class="lead">Hemos recibido tu pago de ₡<?= number_format($_SESSION['pago_monto'] ?? 0, 2) ?> correctamente.</p>
                    <p>Los detalles de tu contrato han sido enviados a <?= $_SESSION['cliente']['correo'] ?? 'tu correo' ?>.</p>
                    
                    <div class="mt-5">
                    <a href="<?= $base_url ?>/index.php?action=planes" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-paw me-2"></i>Ver más planes
                        </a>
                        <a href="<?= $base_url ?>/index.php?action=inicio" class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-home me-2"></i>Volver al inicio
                        </a>
                    </div>
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
