<?php
include_once 'database.class.php';
// usamos el metodo sin crear el objeto
$roles = Rol::ObtenerTodas();

class Rol {
    private $id;
    private $nombre;
    private $conexion;

    public function __construct($id=null, $nombre=null) {
        $this->id = $id; // inicializar el id
        $this->nombre = $nombre; // inicializar el nombre
        $this->conexion = Database::getConnection(); // obtener la conexión a la base de datos
    }
    //en las funciones no estaticas se debe de usar $this->conexion
    // en las funciones estaticas se debe de usar Database::getConnection()

    public static function obtenerTodas() {
        $conexion = Database::getConnection(); 
        $sql = "SELECT * FROM roles";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getConnection();
        $sql = "SELECT * FROM roles WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            return new Rol($resultado['id'], $resultado['nombre']);
        } else {
            return null; 
        }
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