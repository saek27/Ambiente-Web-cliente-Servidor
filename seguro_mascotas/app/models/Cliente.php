<?php
require_once __DIR__ . '/../../config/Database.php';

class Cliente {
    private $conn;

    // Propiedades correspondientes a la tabla 'cliente'
    public $id_cliente;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $direccion;
    public $password;

    public function __construct() {
        $this->conn = Database::connect();
    }

    // Método para crear un nuevo cliente
    public function crear($nombre, $apellido, $telefono, $correo, $direccion, $password) {
        try {
            // Hash de la contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("
                INSERT INTO cliente 
                (nombre, apellido, telefono, correo, direccion, password) 
                VALUES (?, ?, ?, ?, ?, ?)
            ");

            $stmt->execute([
                $nombre,
                $apellido,
                $telefono,
                $correo,
                $direccion,
                $hashed_password
            ]);

            return $this->conn->lastInsertId();

        } catch (PDOException $e) {
            error_log("Error al crear cliente: " . $e->getMessage());
            return false;
        }
    }

    // Método para obtener un cliente por email (para login)
    public function getByEmail($correo) {
        try {
            $stmt = $this->conn->prepare("
                SELECT * FROM cliente 
                WHERE correo = ?
            ");

            $stmt->execute([$correo]);
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error al buscar cliente: " . $e->getMessage());
            return false;
        }
    }

    // Método para verificar contraseña
    public function verifyPassword($input_password, $hashed_password) {
        return password_verify($input_password, $hashed_password);
    }

    // Método opcional: Actualizar información del cliente
    public function actualizar($id_cliente, $nombre, $apellido, $telefono, $direccion) {
        try {
            $stmt = $this->conn->prepare("
                UPDATE cliente 
                SET nombre = ?, apellido = ?, telefono = ?, direccion = ? 
                WHERE id_cliente = ?
            ");

            return $stmt->execute([
                $nombre,
                $apellido,
                $telefono,
                $direccion,
                $id_cliente
            ]);

        } catch (PDOException $e) {
            error_log("Error al actualizar cliente: " . $e->getMessage());
            return false;
        }
    }
}
?>