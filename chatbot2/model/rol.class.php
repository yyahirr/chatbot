<?php
include_once 'database.class.php';


class Rol {
    private int $id;
    private string $nombre;
    private Database $conexion;

    public function __construct(int $id=null, string $nombre=null) {
        $this->id = $id; // inicializar el id
        $this->nombre = $nombre; // inicializar el nombre
        $this->conexion = Database::getInstance()->getConnection(); // obtener la conexión a la base de datos
    }
    //en las funciones no estaticas se debe de usar $this->conexion
    // en las funciones estaticas se debe de usar Database::getConnection()

    public static function obtenerTodas() {
        $sql = "SELECT * FROM roles";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function obtenerPorId(int $id) {
        $sql = "SELECT * FROM roles WHERE id = ?";
        $conexion = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardar() { 
        $sql = "INSERT INTO roles (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    public function actualizar() {
        $sql = "UPDATE roles SET nombre= ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM roles WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
}
}


?>