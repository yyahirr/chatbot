<?php
class Preguntas {
    private $id;
    private $pregunta;
    private $categoria_id;
    private $conexion;

    public function __construct($conexion) {
        // ...
    }

    public function guardar() {
        // ...
    }

    public function obtenerTodas() {
        // ...
    }

    public function obtenerPorId($id) {
        // ...
    }

    public function actualizar($id, $pregunta, $categoria_id) {
        // ...
    }

    public function eliminar($id) {
        // ...
    }
}