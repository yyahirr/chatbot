<?php
include_once 'database.class.php';
// usamos el metodo sin crear el objeto
$roles = Rol::ObtenerTodas();

class Rol {
    private $id;
    private $nombre;
    private $conexion;

    public function __construct($id=null, $nombre=null) {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO roles (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    public function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM roles";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id) {
        // ...
    }

    public function actualizar($id, $nombre) {
        $sql = "UPDATE roles SET nombre= ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }


    }

    public function eliminar($id) {
        $sql = "DELETE FROM roles WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
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



?>