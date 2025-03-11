<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planes de Seguro</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Asegurar que el footer quede pegado abajo */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        
        .planes {
            flex-grow: 1; /* Empuja el footer hacia abajo */
            text-align: center;
            padding: 20px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1> Seguro para Mascotas</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="historia.php">Nuestra Historia</a></li>
                <li><a href="planes.php">Planes</a></li>
            </ul>
        </nav>
    </header>

    <section class="planes">
        <h2>Nuestros Planes</h2>
        <div class="plan">
            <h3>Plan Bronce</h3>
            <p>Seguro básico para emergencias.</p>
            <p><strong>₡5,000/mes</strong></p>
        </div>
        <div class="plan">
            <h3>Plan Plata</h3>
            <p>Cobertura amplia y consultas veterinarias.</p>
            <p><strong>₡10,000/mes</strong></p>
        </div>
        <div class="plan">
            <h3>Plan Oro</h3>
            <p>Seguro premium con hospitalización y vacunas.</p>
            <p><strong>₡15,000/mes</strong></p>
        </div>
        <div class="plan">
            <h3>Plan Diamante</h3>
            <p>Máxima cobertura con cirugías y tratamientos avanzados.</p>
            <p><strong>₡25,000/mes</strong></p>
        </div>
    </section>

    <footer>
        <p>© 2024 PetSeguro - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
