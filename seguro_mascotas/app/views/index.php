<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetSeguro - Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/../../public/assets/css/styles.css">
</head>
<body>

<main class="py-5" style="background-image: url('public/img/fondo5.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;" >
    <div class="container text-center" >
        <div class="p-5 bg-light rounded-4 shadow-sm" >
            <h2 class="display-5 fw-bold mb-3">🐾 Protege a tu mejor amigo</h2>
            <p class="lead">Ofrecemos planes diseñados para el bienestar y la seguridad de tu mascota.</p>
            <?php $base_url1 = "/seguro_mascotas"; ?>
            <a href="<?= $base_url1 ?>/index.php?action=planes" class="btn btn-primary btn-lg mt-3">Ver Planes</a>
        </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="row mt-5">
            <div class="col-12 text-center">
                <div class="p-4 bg-light rounded-3">
                    <h3 class="h4 mb-3">¿Tiene alguna duda?</h3>
                    <a href="/seguro_mascotas/app/views/contacto.php" class="btn btn-outline-primary">
                        <i class="fas fa-phone-alt me-2" ></i> Contáctanos
                    </a>
                </div>
            </div>
        </div>
</body>
</html>

<?php include 'footer.php'; ?>
