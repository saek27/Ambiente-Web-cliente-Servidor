<?php include __DIR__ . '/../header.php';


// 1. Generar el Token (al inicio del archivo)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

<?php 
$base_url = '/seguro_mascotas'; 
?>
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
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Proceso de Pago</h3>
                </div>
                
                <div class="card-body">
                    <!-- Resumen del Plan -->
                    <div class="alert alert-info">
                        <h4><?= $plan['nombre'] ?></h4>
                        <p class="lead">Total a pagar: ₡<?= number_format($plan['precio_mensual'], 2) ?></p>
                    </div>

                    <form action="<?= $base_url ?>/index.php?action=procesar_pago" method="POST">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <input type="hidden" name="plan_id" value="<?= $plan['id_plan'] ?>">
                        <input type="hidden" name="monto" value="<?= $plan['precio_mensual'] ?>">

                        <!-- Selector de Método de Pago -->
                        <div class="mb-4">
                            <label class="form-label">Método de Pago:</label>
                            <select class="form-select" id="metodoPago" name="metodo_pago_id" required>
                                <option value="">Seleccione un método</option>
                                <?php foreach ($metodos as $metodo): ?>
                                <option value="<?= $metodo['id_metodo'] ?>"><?= $metodo['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Campos Dinámicos -->
                        <div id="camposPago">
                            <!-- Los campos se cargan dinámicamente via JS -->
                        </div>

                        <button type="submit" class="btn btn-success btn-lg w-100 mt-4">
                            <i class="fas fa-lock me-2"></i> Realizar Pago
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Campos dinámicos según método de pago
document.getElementById('metodoPago').addEventListener('change', function() {
    const container = document.getElementById('camposPago');
    const metodo = this.value;
    
    let html = '';
    switch(metodo) {
        case '1': // SINPE Móvil
            html = `
                <div class="mb-3">
                    <label class="form-label">Número de Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" pattern="[0-9]{8}" required>
                </div>`;
            break;
            
        case '2': // Tarjeta
            html = `
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Número de Tarjeta</label>
                        <input type="text" class="form-control" name="tarjeta" pattern="[0-9]{16}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">CVV</label>
                        <input type="text" class="form-control" name="cvv" pattern="[0-9]{3}" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Expiración</label>
                        <input type="month" class="form-control" name="expiracion" required>
                    </div>
                </div>`;
            break;
    }
    
    container.innerHTML = html;
});
</script>
<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include __DIR__ . '/../footer.php';