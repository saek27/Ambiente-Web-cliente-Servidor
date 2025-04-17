<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - PetSeguro</title>
    <link rel="stylesheet" href="../../public/assets/css/contacto.css">
</head>
<body style="background-image: url('../../public/img/fondo5.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <header>
        <h1>Contáctanos</h1>
        <nav>
            <ul>
                <li><?php $base_url = "/seguro_mascotas"; ?>
                <a href="<?= $base_url ?>/index.php?action=inicio">Inicio</a></li>
                <li><?php $base_url = "/seguro_mascotas"; ?>
            <a href="<?= $base_url ?>/index.php?action=planes">Planes</a>
        </li>
                <li><a href="/seguro_mascotas/app/views/historia.php">Nosotros</a></li>
            </ul>
        </nav>
    </header>

    <main >
        <section class="contacto" >
            <h2>Estamos aquí para ayudarte</h2>
            <p>¿Tienes preguntas, sugerencias o deseas saber más sobre nuestros planes? ¡Nos encantará escucharte!</p>

            <div class="info-contacto">
    <h3>Dirección</h3>
    <p>Nuestra sede principal se encuentra ubicada en <strong>Guadalupe, Goicoechea</strong>, específicamente en:</p>
    <p><em>200 metros este del parque central de Guadalupe, contiguo a la Farmacia Santa Lucía, San José, Costa Rica.</em></p>

    <p>Sin embargo, puedes contactar a cualquiera de nuestras <strong>veterinarias asociadas</strong>, las cuales puedes ubicar fácilmente en el siguiente mapa interactivo:</p>
</div>
                <div>
                    <h3>Teléfono</h3>
                    <p>+506 2222-3333</p>
                </div>
                <div>
                    <h3>Correo Electrónico</h3>
                    <p>contacto@petseguro.cr</p>
                </div>
            </div>

            <div class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d53087.517627547706!2d-84.06533434815684!3d9.943919877985268!3m2!1i1024!2i768!4f13.1!2m1!1sveterinarias!5e1!3m2!1ses!2scr!4v1744918669132!5m2!1ses!2scr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>



</body>
</html>
//<?php include 'footer.php'; ?>