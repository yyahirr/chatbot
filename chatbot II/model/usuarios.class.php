<?php
class Usuarios {
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol_id;
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

    public function obtenerPorEmail($email) {
        // ...
    }

    public function verificarLogin($email, $password) {
        // ...
    }
}