<?php
include_once 'database.class.php';

class Preguntas {
    private $id;
    private $pregunta;
    private $categoria_id;
    private $conexion;

    public function __construct($conexion) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria_id = $categoria_id;
        $this->conexion = $conexion;
        $this->conexion = Database::getConnection();
    }

    public static function obtenerTodas() {
        $conexion = Database::GetConnection();
        $sql = "SELECT * FROM preguntas";
        $stmt->execute();
        return $stmt = fetchall(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::GetConnection();
        $sql = "SELECT * FROM preguntas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        
    }

    public function guardar() {
        // ...
    }

    public function actualizar($id, $pregunta, $categoria_id) {
        // ...
    }

    public function eliminar($id) {
        // ...
    }
}