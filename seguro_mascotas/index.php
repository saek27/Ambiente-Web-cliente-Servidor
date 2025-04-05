<?php
session_start();
require_once 'config/database.php';

// Autocarga de controladores
spl_autoload_register(function ($class) {
    require_once "app/controllers/{$class}.php";
});

// Manejo de rutas
$action = $_GET['action'] ?? 'inicio';

switch ($action) {
    case 'inicio':
        require 'app/views/index.php';
        break;
    
    case 'planes':
        $controller = new PlanController();
        $planes = $controller->getAllPlanes();
        require 'app/views/planes.php';
        break;
    
    case 'mascotas':
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
        $controller = new MascotaController();
        $mascotas = $controller->getMascotasUsuario($_SESSION['user']['id']);
        require 'app/views/mascotas/index.php';
        break;
    
    case 'login':
        require 'app/views/auth/login.php';
        break;
    
    default:
        http_response_code(404);
        require 'app/views/errors/404.php';
}
?>