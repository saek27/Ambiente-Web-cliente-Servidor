<?php

require_once __DIR__ . '/../../../config/Database.php';


// Redirigir si ya está logueado
if (isset($_SESSION['cliente_id'])) {
    header("Location: /seguro_mascotas/index.php?action=inicio");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    try {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT id_cliente, password FROM cliente WHERE correo = ?");
        $stmt->execute([$correo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['cliente_id'] = $user['id_cliente'];
            header("Location: /seguro_mascotas/index.php?action=inicio");
            exit;
        } else {
            echo "❌ Credenciales incorrectas";
        }
    } catch (PDOException $e) {
        echo "❌ Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - PetSeguro</title>
    <link rel="stylesheet" href="/seguro_mascotas/public/assets/css/login.css">
    <style>
        .logo-container {
            position: absolute;
            top: 0px;
            left: 0px;
        }

        .logo-container img {
            height: 250px;
            width: auto;
        }
    </style>
</head>
<body style="background-image: url('/seguro_mascotas/public/img/fonfoLogin1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <!-- Logo -->
    <div class="logo-container">
        <img src="/seguro_mascotas/public/img/logo.png" alt="Logo PetSeguro">
    </div>

    <!-- Formulario HTML -->
    <form method="POST">
        <h2>Iniciar Sesión</h2>
        <input type="email" name="correo" placeholder="Correo" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <button type="submit">Iniciar Sesión</button>
    </form>

</body>
</html>


