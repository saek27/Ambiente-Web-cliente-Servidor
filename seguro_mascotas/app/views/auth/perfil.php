<?php include 'header.php'; ?>

<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Mi Perfil</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="/seguro_mascotas/public/img/avatar.png" 
                         class="img-thumbnail mb-3" 
                         alt="Avatar" 
                         style="width: 200px; height: 200px; object-fit: cover;">
                    <!-- Espacio reservado para futura subida de foto -->
                </div>
                <div class="col-md-8">
                    <h4><?= htmlspecialchars($_SESSION['cliente']['nombre']) ?></h4>
                    <dl class="row">
                        <dt class="col-sm-3">Correo:</dt>
                        <dd class="col-sm-9"><?= htmlspecialchars($_SESSION['cliente']['correo']) ?></dd>

                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9"><?= htmlspecialchars($_SESSION['cliente']['telefono']) ?? 'No registrado' ?></dd>

                        <dt class="col-sm-3">Dirección:</dt>
                        <dd class="col-sm-9"><?= htmlspecialchars($_SESSION['cliente']['direccion']) ?? 'No registrada' ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>