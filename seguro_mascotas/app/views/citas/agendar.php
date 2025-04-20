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
    <h2 class="mb-4">📅 Agendar Nueva Cita</h2>

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">✅ Cita agendada correctamente.</div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger">❌ Error al agendar la cita.</div>
    <?php endif; ?>

    <form action="<?= $base_url ?>/index.php?action=guardar_cita" method="POST">
        <div class="mb-3">
            <label for="mascota_id">Mascota</label>
            <select name="mascota_id" class="form-select" required>
                <option value="">Seleccionar</option>
                <?php foreach ($misMascotas as $m): ?>
                    <option value="<?= $m['id_mascota'] ?>"><?= $m['nombre'] ?> - <?= $m['raza'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="veterinaria_id">Veterinaria</label>
            <select name="veterinaria_id" class="form-select" required>
                <option value="">Seleccionar</option>
                <?php foreach ($veterinarias as $v): ?>
                    <option value="<?= $v['id_veterinaria'] ?>"><?= $v['nombre'] ?> - <?= $v['direccion'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha">Fecha de la cita</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="motivo">Motivo de la consulta</label>
            <textarea name="motivo" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Agendar Cita</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include __DIR__ . '/../footer.php'; ?>
