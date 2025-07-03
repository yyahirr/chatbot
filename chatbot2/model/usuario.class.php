<?php
include_once 'database.class.php';

class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol_id;
    private $conexion;

    public function __construct($id=null, $nombre=null, $email=null, $password=null, $rol_id=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email; 
        $this->password = $password;
        $this->rol_id = $rol_id;
        $this->conexion = database::getConnection();
    }

    public function guardar() {
    $sql = "INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (?, ?, ?, ?)";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol_id]);
}
    public function actualizar() {
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, rol_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol_id, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }


    public static function obtenerTodas() {
        $conexion = Database::getConnection();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getConnection();
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado; 
}

    public function obtenerPorEmail($email) {
        $conexion = Database::getConnection();
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
