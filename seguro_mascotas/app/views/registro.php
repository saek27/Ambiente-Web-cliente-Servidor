<?php
require_once __DIR__ . '/../../config/Database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO cliente (nombre, apellido, telefono, correo, direccion, password)
                              VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellido, $telefono, $correo, $direccion, $password]);
        $mensaje = "✅ Registro exitoso. Ahora puedes iniciar sesión.";
    } catch (PDOException $e) {
        $mensaje = "❌ Error: " . $e->getMessage();
    }
}
$base_url = "/seguro_mascotas";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - PetSeguro</title>
    <link rel="stylesheet" href="/seguro_mascotas/public/assets/css/registro.css"></head>
    <body style="background-image: url('/seguro_mascotas/public/img/fonfoLogin1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <div class="container">
        <img src="/seguro_mascotas/public/img/logo.png" alt="Logo PetSeguro" class="logo">
        <h2>Registro de Cliente</h2>

        <?php if (isset($mensaje)) echo "<p class='mensaje'>$mensaje</p>"; ?>

        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="text" name="telefono" placeholder="Teléfono" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>

        <p>¿Ya tienes cuenta?</p>
        <a href="<?= $base_url ?>/index.php?action=login" class="btn-secundario">Iniciar Sesión</a>
    </div>
</body>
</html>
