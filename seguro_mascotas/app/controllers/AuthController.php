<?php
require_once '../models/Database.php';
require_once '../models/Usuario.php';

class AuthController extends Database {
    public function login($email, $password) {
        $usuario = new Usuario();
        $user = $usuario->getByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }
}
?>