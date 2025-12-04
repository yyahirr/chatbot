<?php
class Database {
    private string $nombre = "chatbot_2";
    private string $servidor = "localhost";
    private string $usuario = "root";
    private string $clave = "";
    private PDO $conexion;
    private static ?Database $instancia = null;

    // Constructor privado para evitar instanciación directa
    private function __construct() {
        $dsn = "mysql:host={$this->servidor};dbname={$this->nombre};charset=utf8mb4";
        try {
            $this->conexion = new PDO($dsn, $this->usuario, $this->clave);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // -------------------
    // MÉTODOS ESTÁTICOS
    // -------------------

    public static function getInstance(): Database {
        if (self::$instancia === null) {
            self::$instancia = new Database();
        }
        return self::$instancia;
    }

    public function getConnection(): PDO {
        return $this->conexion;
    }

    // -------------------
    // GETTERS & SETTERS
    // -------------------

    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getServidor(): string {
        return $this->servidor;
    }

    public function setServidor(string $servidor): void {
        $this->servidor = $servidor;
    }

    public function getUsuario(): string {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): void {
        $this->usuario = $usuario;
    }

    public function getClave(): string {
        return $this->clave;
    }

    public function setClave(string $clave): void {
        $this->clave = $clave;
    }

    public function getConexion(): PDO {
        return $this->conexion;
    }

    public function setConexion(PDO $conexion): void {
        $this->conexion = $conexion;
    }

    public static function getInstancia(): ?Database {
        return self::$instancia;
    }

    public static function setInstancia(?Database $instancia): void {
        self::$instancia = $instancia;
    }
}
