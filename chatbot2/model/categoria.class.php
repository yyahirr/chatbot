<?php
include_once 'database.class.php';

// usamos el metodo sin crear el objeto
$categorias = Categoria::obtenerTodas();

class Categoria {
    private $id;
    private $nombre;
    private $conexion;

    // para las variables estaticas se usa Database::getConnection()
    // para las variables no estaticas se usa $this->conexion

    public function __construct($id = null, $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = Database::getConnection();
    }

    public static function obtenerTodas() {
        $sql = "SELECT * FROM categoria";
        $conexion = Database::getConnection();
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM categoria WHERE id = ?";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardar() {
        $sql = "INSERT INTO categoria (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    public function actualizar() {
        $sql = "UPDATE categoria SET nombre = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM categoria WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getId() {
        return $this->id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setId($id) {
        $this->id = $id;
    }
}