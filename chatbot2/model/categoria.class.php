<?php
class Categoria {
    private $id;
    private $nombre;
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

    public function actualizar($id, $nombre) {
        // ...
    }

    public function eliminar($id) {
        // ...
    }
}