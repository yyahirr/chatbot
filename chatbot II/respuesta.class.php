<?php
class Respuesta {
    private $id;
    private $respuesta;
    private $pregunta_id;
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

    public function actualizar($id, $respuesta, $pregunta_id) {
        // ...
    }

    public function eliminar($id) {
        // ...
    }
}