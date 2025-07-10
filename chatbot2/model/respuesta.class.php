<?php
include_once 'database.class.php';

class Respuesta {
    private $id;
    private $respuesta;
    private $pregunta_id;
    private $conexion;

    public function __construct($id = null, $respuesta = null, $pregunta_id = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta_id = $pregunta_id;
        $this->conexion = Database::GetConnection();
    }


    public static function obtenerTodas() {
        $sql = "SELECT * from respuesta";
        $stmt = Database::GetConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT * FROM respuesta WHERE id = ?";
        $stmt = Database::GetConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function guardar() {
        $sql = "INSERT INTO respuesta (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id]);
    }

    public function actualizar() {
        $sql = "UPDATE respuesta SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id, $this->id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM respuesta WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getId() {
        return $this->id;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }

    public function getPreguntaId() {
        return $this->pregunta_id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPreguntaId($pregunta_id) {
        $this->pregunta_id = $pregunta_id;
    }

    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }
}



