
<?php
include_once 'database.class.php';

class Conversaciones {
    private $id;
    private $pregunta_usuario;
    private $respuesta_bot;
    private $fecha_hora;
    private $conexion;

    public function __construct($id = null, $pregunta_usuario = null, $respuesta_bot = null, $fecha_hora = null) {
        $this->id = $id;
        $this->pregunta_usuario = $pregunta_usuario;
        $this->respuesta_bot = $respuesta_bot;
        $this->fecha_hora = $fecha_hora;
        $this->conexion = Database::GetConnection();
    }

    public static function obtenerTodas() {
        $sql = "SELECT * from conversaciones";
        $stmt = Database::GetConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM conversaciones WHERE id = ?";
        $stmt = Database::GetConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar() {
        $sql="INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->pregunta_usuario, $this->respuesta_bot, $this->fecha_hora]);
    }

}
