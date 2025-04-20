<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../../../config/Database.php';

// Redirigir si ya está logueado
if (isset($_SESSION['cliente'])) {
    header("Location: /seguro_mascotas/index.php?action=inicio");
    exit;
}

$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST['correo'] ?? '';
    $password = $_POST['password'] ?? '';

    try {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT id_cliente, password FROM cliente WHERE correo = ?");
        $stmt->execute([$correo]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Obtener todos los datos del cliente
            $stmt = $db->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
            $stmt->execute([$user['id_cliente']]);
            $_SESSION['cliente'] = $stmt->fetch(PDO::FETCH_ASSOC);
            
            header("Location: /seguro_mascotas/index.php?action=inicio");
            exit;
        } else {
            $error = "❌ Credenciales incorrectas";
        }
    } catch (PDOException $e) {
        $error = "❌ Error en el servidor: " . $e->getMessage();
    }
}

$base_url = "/seguro_mascotas";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - PetSeguro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 15px;
            width: 400px;
            margin: 150px auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo-container img {
            height: 180px;
            width: auto;
        }

        body {
            background-image: url('/seguro_mascotas/public/img/fonfoLogin1.jpg');
            background-size: cover;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <!-- Logo -->
    <div class="logo-container">
        <img src="/seguro_mascotas/public/img/logo.png" alt="Logo PetSeguro">
    </div>

    <!-- Formulario -->
    <div class="login-container">
        <h2 class="text-center mb-4">Iniciar Sesión</h2>
        
        <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <input type="email" 
                       name="correo" 
                       class="form-control" 
                       placeholder="Correo electrónico" 
                       required
                       value="<?= htmlspecialchars($_POST['correo'] ?? '') ?>">
            </div>
            
            <div class="mb-3">
                <input type="password" 
                       name="password" 
                       class="form-control" 
                       placeholder="Contraseña" 
                       required>
            </div>
            
            <button type="submit" class="btn btn-primary w-100 mb-3">Iniciar Sesión</button>
            
            <div class="text-center">
                <a href="<?= $base_url ?>/index.php?action=registro" class="text-decoration-none">
                    ¿No tienes cuenta? Regístrate aquí
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>