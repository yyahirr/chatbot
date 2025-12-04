<?php
include_once 'database.class.php';
include_once 'pregunta.class.php';

class Respuesta {
    private ?int $id;
    private ?string $texto;
    private ?Pregunta $pregunta;
    private $conexion;

    public function __construct(?int $id = null, ?string $texto = null, ?Pregunta $pregunta = null) {
        $this->id = $id;
        $this->texto = $texto;
        $this->pregunta = $pregunta;
        $this->conexion = Database::getInstance()->getConnection();
    }

    // -------------------
    // MÉTODOS CRUD
    // -------------------

    public function guardar() {
        $sql = "INSERT INTO respuesta (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $preguntaId = ($this->pregunta instanceof Pregunta) ? $this->pregunta->getId() : $this->pregunta;
        return $stmt->execute([$this->texto, $preguntaId]);
    }

    public function actualizar() {
        $sql = "UPDATE respuesta SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $preguntaId = ($this->pregunta instanceof Pregunta) ? $this->pregunta->getId() : $this->pregunta;
        return $stmt->execute([$this->texto, $preguntaId, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM respuesta WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // -------------------
    // MÉTODOS ESTÁTICOS
    // -------------------

    public static function obtenerTodas() {
        $sql = "SELECT * FROM respuesta";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $respuestas = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pregunta = null;
            if (!empty($fila['pregunta_id'])) {
                $pregunta = Pregunta::obtenerPorId((int)$fila['pregunta_id']);
            }
            $respuestas[] = new Respuesta((int)$fila['id'], $fila['respuesta'], $pregunta);
        }
        return $respuestas;
    }

    public static function obtenerPorId(?int $id) {
        $sql = "SELECT * FROM respuesta WHERE id = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            $pregunta = null;
            if (!empty($resultado['pregunta_id'])) {
                $pregunta = Pregunta::obtenerPorId((int)$resultado['pregunta_id']);
            }
            return new Respuesta((int)$resultado['id'], $resultado['respuesta'], $pregunta);
        }
        return null;
    }

    // -------------------
    // GETTERS & SETTERS
    // -------------------

    public function getId(): ?int {
        return $this->id;
    }

    public function getTexto(): ?string {
        return $this->texto;
    }

    public function getPregunta(): ?Pregunta {
        return $this->pregunta;
    }

    public function setId(?int $id) {
        $this->id = $id;
    }

    public function setTexto(?string $texto) {
        $this->texto = $texto;
    }

    public function setPregunta(?Pregunta $pregunta) {
        $this->pregunta = $pregunta;
    }
}
