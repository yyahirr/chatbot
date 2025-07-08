<?php
include_once 'database.class.php';

class Preguntas {
    private $id;
    private $pregunta;
    private $categoria_id;
    private $conexion;

    public function __construct($id = null, $pregunta = null, $categoria_id = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria_id = $categoria_id;
        $this->conexion = Database::getConnection();
    }

    public static function obtenerTodas() {
    $conexion = Database::getConnection();
    $sql = "SELECT * FROM preguntas";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
    $conexion = Database::getConnection();
    $sql = "SELECT * FROM preguntas WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardar() {
    $sql = "INSERT INTO preguntas (pregunta, categoria_id) VALUES (?, ?)";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([$this->pregunta, $this->categoria_id]);
    }

    public function actualizar() {
    $sql = "UPDATE preguntas SET pregunta = ?, categoria_id = ? WHERE id = ?";
    $stmt = $this->conexion->prepare($sql);
    return $stmt->execute([$this->pregunta, $this->categoria_id, $this->id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }
}