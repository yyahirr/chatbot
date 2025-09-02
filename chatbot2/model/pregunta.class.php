<?php
include_once 'database.class.php';
include_once 'categoria.class.php';

class Preguntas {
    private int $id;
    private string $pregunta;
    private Categoria $categoria_id;
    private Database $conexion;

    public function __construct(int $id = null, string $pregunta = null, Categoria $categoria_id = null) {
        $this->id = $id;
        $this->pregunta = $pregunta;
        $this->categoria_id = $categoria_id;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public static function obtenerTodas() {
    $conexion = Database::getInstance()->getConnection()->prepare($sql);
    $sql = "SELECT * FROM preguntas";
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId(int $id) {
    $conexion = Database::getInstance()->getConnection()->prepare($sql);
    $sql = "SELECT * FROM preguntas WHERE id = ?";
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

    public function eliminar(int $id) {
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    //GETTERS Y SETTERS

    public function getId(){
        return $this->id;
    }

    public function getPregunta(){
        return $this->pregunta;
    }

    public function getCategoria(){
        return $this->categoria_id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setPregunta(string $pregunta){
        $this->pregunta = $pregunta;
    }

    public function setCategoria(int $categoria_id){
        $this->categoria_id = $categoria_id;
    }
}