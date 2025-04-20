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

    case 'Registro':
        require 'app/views/registro.php';
        break;
    
    case 'login':
        require 'app/views/auth/login.php';
        break;

    case 'mascotas':
            $controller = new MascotaController();
            $controller->mostrarMascotas();
            break;
    case 'registrar_mascota':
            $controller = new MascotaController();
            $controller->registrarMascota();
            break;
    case 'agendar_cita':
            $controller = new CitaController();
            $controller->formulario();
            break; 
    case 'guardar_cita':
            $controller = new CitaController();
            $controller->nuevaCita();
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

    case 'perfil':
        require 'app/views/auth/perfil.php'; // Crear esta vista
        break;
    
    case 'logout':
        session_start();
        session_unset();
        session_destroy();
        header("Location: /seguro_mascotas/index.php?action=inicio");
        exit;
        break;
        
                
    default:
        http_response_code(404);
        require 'app/views/errors/404.php';
        break;
} 
?>