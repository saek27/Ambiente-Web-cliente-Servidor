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
    <h2 class="mb-4">🐶 Mis Mascotas</h2>

    <?php if (!empty($lista)): ?>
        <ul class="list-group">
            <?php foreach ($lista as $m): ?>
                <li class="list-group-item">
                    <strong><?= htmlspecialchars($m['nombre']) ?></strong> - <?= htmlspecialchars($m['raza']) ?> 
                    (Nacimiento: <?= $m['fecha_nacimiento'] ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No has registrado ninguna mascota aún.</p>
    <?php endif; ?>

    <hr class="my-4">

    <h4>Registrar nueva mascota</h4>
    <form action="<?= $base_url ?>/index.php?action=registrar_mascota" method="POST">
        <div class="mb-3">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <input type="text" name="raza" class="form-control" placeholder="Raza" required>
        </div>
        <div class="mb-3">
            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Mascota</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include __DIR__ . '/../footer.php'; ?>
