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
                <div>
                    <h3>Dirección</h3>
                    <p>La California, San José, Costa Rica</p>
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
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.0121691803694!2d-84.06314468571987!3d9.933520476946315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0fa3be6c4cfbd%3A0x7a4f43273435369f!2sLa%20California%2C%20San%20Jos%C3%A9%2C%20Costa%20Rica!5e0!3m2!1ses-419!2scr!4v1615131221330!5m2!1ses-419!2scr" 
                    width="100%" 
                    height="300" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </section>
    </main>


</body>
</html>
//<?php include 'footer.php'; ?>