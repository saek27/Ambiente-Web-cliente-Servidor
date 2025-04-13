<?php
class Database {
    private static $host = 'localhost';
    private static $dbname = 'seguro_veterinario';
    private static $username = 'root';
    private static $password = '';

    public static function connect() {
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("❌ Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
}
