<?php
include_once 'database.class.php';

class Conversacion {
    private ?int $id;
    private ?string $preguntaUsuario;
    private ?string $respuestaBot;
    private ?string $fechaHora;
    private $conexion;

    public function __construct(?int $id = null, ?string $preguntaUsuario = null, ?string $respuestaBot = null, ?string $fechaHora = null) {
        $this->id = $id;
        $this->preguntaUsuario = $preguntaUsuario;
        $this->respuestaBot = $respuestaBot;
        $this->fechaHora = $fechaHora;
        $this->conexion = Database::getInstance()->getConnection();
    }

    // -------------------
    // MÉTODOS CRUD
    // -------------------

    public function guardar() {
        $sql = "INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->preguntaUsuario, $this->respuestaBot, $this->fechaHora]);
    }

    public function actualizar() {
        $sql = "UPDATE conversaciones SET pregunta_usuario = ?, respuesta_bot = ?, fecha_hora = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->preguntaUsuario, $this->respuestaBot, $this->fechaHora, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM conversaciones WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // -------------------
    // MÉTODOS ESTÁTICOS
    // -------------------

    public static function obtenerTodas() {
        $sql = "SELECT * FROM conversaciones";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $conversaciones = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $conversaciones[] = new Conversacion(
                (int)$fila['id'],
                $fila['pregunta_usuario'],
                $fila['respuesta_bot'],
                $fila['fecha_hora']
            );
        }
        return $conversaciones;
    }

    public static function obtenerPorId(?int $id) {
        $sql = "SELECT * FROM conversaciones WHERE id = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Conversacion(
                (int)$resultado['id'],
                $resultado['pregunta_usuario'],
                $resultado['respuesta_bot'],
                $resultado['fecha_hora']
            );
        }
        return null;
    }

    // -------------------
    // GETTERS & SETTERS
    // -------------------

    public function getId(): ?int {
        return $this->id;
    }

    public function getPreguntaUsuario(): ?string {
        return $this->preguntaUsuario;
    }

    public function getRespuestaBot(): ?string {
        return $this->respuestaBot;
    }

    public function getFechaHora(): ?string {
        return $this->fechaHora;
    }

    public function setId(?int $id) {
        $this->id = $id;
    }

    public function setPreguntaUsuario(?string $preguntaUsuario) {
        $this->preguntaUsuario = $preguntaUsuario;
    }

    public function setRespuestaBot(?string $respuestaBot) {
        $this->respuestaBot = $respuestaBot;
    }

    public function setFechaHora(?string $fechaHora) {
        $this->fechaHora = $fechaHora;
    }
}
