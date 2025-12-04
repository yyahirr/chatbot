<?php
include_once 'database.class.php';

class Rol {
    private ?int $id;
    private ?string $nombre;
    private $conexion;

    public function __construct(?int $id = null, ?string $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = Database::getInstance()->getConnection();
    }

    // -------------------
    // MÉTODOS CRUD
    // -------------------

    public function guardar() { 
        $sql = "INSERT INTO roles (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    public function actualizar() {
        $sql = "UPDATE roles SET nombre = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM roles WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // -------------------
    // MÉTODOS ESTÁTICOS
    // -------------------

    public static function obtenerTodas() {
        $sql = "SELECT * FROM roles";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $roles = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $roles[] = new Rol((int)$fila['id'], $fila['nombre']);
        }
        return $roles;
    }

    public static function obtenerPorId(?int $id) {
        $sql = "SELECT * FROM roles WHERE id = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Rol((int)$resultado['id'], $resultado['nombre']);
        }
        return null;
    }

    // -------------------
    // GETTERS & SETTERS
    // -------------------

    public function getId(): ?int {
        return $this->id;
    }

    public function getNombre(): ?string {
        return $this->nombre;
    }

    public function setId(?int $id) {
        $this->id = $id;
    }

    public function setNombre(?string $nombre) {
        $this->nombre = $nombre;
    }
}
