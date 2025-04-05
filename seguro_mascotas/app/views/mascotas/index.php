<?php include '../header.php'; ?>

<section class="container mt-4">
    <h2>Mis Mascotas</h2>
    
    <a href="/mascotas/registrar" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Registrar Nueva Mascota
    </a>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mascotas as $mascota): ?>
                <tr>
                    <td><?= htmlspecialchars($mascota['nombre']) ?></td>
                    <td><?= htmlspecialchars($mascota['especie']) ?></td>
                    <td><?= htmlspecialchars($mascota['raza']) ?></td>
                    <td><?= $mascota['edad'] ?> años</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include '../footer.php'; ?>