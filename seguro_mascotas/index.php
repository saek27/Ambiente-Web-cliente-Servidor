<?php
session_start();
require_once 'config/database.php';

// Autocarga de controladores
spl_autoload_register(function ($class) {
    $paths = [
        "app/controllers/{$class}.php",
        "app/models/{$class}.php"
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
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

    case 'contratar':
        $controller = new PlanController();
        $controller->contratar();
        break;

    case 'mostrar_pago':
        $controller = new PaymentController();
        $controller->mostrarFormularioPago($_GET['plan_id']);
        break;

    case 'procesar_pago':
        $controller = new PaymentController();
        $controller->procesarPago();
        break;

    case 'login':
        require 'app/views/auth/login.php';
        break;

    case 'mascotas':
        if (!isset($_SESSION['cliente'])) {
            header("Location: login");
            exit;
        }
        $controller = new MascotaController();
        $mascotas = $controller->getMascotasUsuario($_SESSION['cliente']['id_cliente']);
        require 'app/views/mascotas/index.php';
        break;
    case 'pago_exitoso':
        require 'app/views/pagos/exito.php';
        break;
    case 'pago_error':
        require 'app/views/pagos/error.php';
        break;
    case 'cancelar_plan':
        $controller = new PlanController();
        $controller->mostrarCancelarPlan();
        break;
        
    case 'confirmar_cancelacion':
        $controller = new PlanController();
        $controller->cancelarPlan();
        break;
                

    default:
        http_response_code(404);
        require 'app/views/errors/404.php';
        break;
} 
?>