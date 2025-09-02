<?php
include_once 'database.class.php';
include_once 'rol.class.php';

class Usuario {
    private int $id;
    private string $nombre;
    private string $email;
    private string $password;
    private Rol $rol_id;
    private Database $conexion;

    public function __construct(int $id=null, string $nombre=null, string $email=null, string $password=null, Rol $rol_id=null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email; 
        $this->password = $password;
        $this->rol_id = $rol_id;
        $this->conexion = Database::getInstance()->getConnection();
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
        $sql = "SELECT * FROM usuarios";
        $conexion = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function obtenerPorId(int $id){
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $conexion = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
}
    public function obtenerPorEmail(string $email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $conexion = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // GETTERS & SETTERS

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRol(){
        return $this->rol_id;
    }

    public function setId(int $id){
        $this->id = $id;
    }
    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }
    public function setEmail(string $email){
        $this->email = $email;
    }
    public function setPassword(string $password){
        $this->password = $password;
    }
    public function setRol(int $rol_id){
        $this->rol = $rol_id;
    }
}
