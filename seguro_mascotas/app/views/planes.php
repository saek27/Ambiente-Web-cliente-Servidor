<?php
$planController = new PlanController();
$planes = $planController->getAllPlanes();
?>

<section class="planes">
    <h2>Nuestros Planes</h2>
    <?php foreach ($planes as $plan): ?>
    <div class="plan">
        <h3><?= $plan['nombre'] ?></h3>
        <p><?= $plan['descripcion'] ?></p>
        <p><strong>₡<?= number_format($plan['precio'], 2) ?>/mes</strong></p>
    </div>
    <?php endforeach; ?>
</section>