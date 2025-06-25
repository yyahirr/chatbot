<?php

// Singleton es un patrón de diseño utilizado para restringir la instanciación de una clase a un único objeto.
// Esto es útil cuando exactamente un objeto es necesario para coordinar acciones a través del sistema.
// un ejemplo de uso de este patrón es una clase de database, que solo debe tener una instancia para evitar conexiones múltiples.

class database{ // Clase database, se usa para manejar la conexión a la base de datos
    private $nombre= "sistema"; // Nombre de la base de datos
    private $usuario = "root"; // Usuario de la base de datos
    private $clave = ""; // Clave de la base de datos
    private $servidor = "localhost"; // Servidor de la base de datos
    private $conexion = null; // Variable para almacenar la conexión a la base de datos

    private static $instancia = null; // Variable estática para almacenar la instancia de la clase

    private function __construct(){ // Constructor privado para evitar la instanciación directa
        $dnfs = "mysql:host=$this->servidor;dbname=$this->nombre;charset=utf8mb4"; // Definición del DSN (Data Source Name)
        // el DSN es una cadena que contiene la información necesaria para conectarse a la base de datos
        try {
            $this->conexion = new PDO($dnfs, $this->usuario, $this->clave); // Creación de la conexión a la base de datos
            //ademas crea un objeto PDO que se usa para interactuar con la base de datos
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configuración del modo de error
        } catch (PDOException $e) { // Manejo de excepciones en caso de error de conexión
            echo "Error de conexión: " . $e->getMessage(); // Mensaje de error
        }
    }

    public function getConnection(){ // Método público para obtener la conexión a la base de datos
        if (self::$instancia == null) { // Si no hay una instancia de la clase, se crea una nueva
            self::$instancia = new database(); // Se crea una nueva instancia de la clase
        }
        return self::$instancia->conexion; // Se devuelve la conexión a la base de datos
    }

}

?>