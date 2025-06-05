<?php

class Database {
    private $nombre="chatbot_2";
    private $servidor="localhost";
    private $usuario="root";
    private $clave= "";
    private $conexion;

    private $instance = null;

    public function __construct() {
        $dnfs = "mysql:host=$this->servidor;dbname=$this->nombre;charset=utf8mb4";
        try {
            $this->conexion = new PDO($dnfs, $this->usuario, $this->clave);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } die (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }

    }

    public function getConnection(){
        if(!self::instancia){
            self::instancia = new Database();
        }
        return self::instancia;

    }

}

?>