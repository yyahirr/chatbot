<?php
include_once 'database.class.php';
include_once 'categoria.class.php';

class Pregunta {
    private ?int $id;
    private ?string $texto;
    private ?Categoria $categoria;
    private $conexion;

    public function __construct(?int $id = null, ?string $texto = null, ?Categoria $categoria = null) {
        $this->id = $id;
        $this->texto = $texto;
        $this->categoria = $categoria;
        $this->conexion = Database::getInstance()->getConnection();
    }

    // -------------------
    // MÉTODOS CRUD
    // -------------------

    public function guardar() {
        $sql = "INSERT INTO preguntas (pregunta, categoria_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $categoriaId = ($this->categoria instanceof Categoria) ? $this->categoria->getId() : $this->categoria;
        return $stmt->execute([$this->texto, $categoriaId]);
    }

    public function actualizar() {
        $sql = "UPDATE preguntas SET pregunta = ?, categoria_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $categoriaId = ($this->categoria instanceof Categoria) ? $this->categoria->getId() : $this->categoria;
        return $stmt->execute([$this->texto, $categoriaId, $this->id]);
    }

    public function eliminar() {
        try {
            // 1. Eliminar primero las respuestas asociadas
            $sqlResp = "DELETE FROM respuesta WHERE pregunta_id = ?";
            $stmtResp = $this->conexion->prepare($sqlResp);
            $stmtResp->execute([$this->id]);

            // 2. Luego eliminar la pregunta
            $sqlPreg = "DELETE FROM preguntas WHERE id = ?";
            $stmtPreg = $this->conexion->prepare($sqlPreg);
            return $stmtPreg->execute([$this->id]);

        } catch (PDOException $e) {
            // Podés loguear el error o devolver false
            return false;
        }
    }

    // -------------------
    // MÉTODOS ESTÁTICOS
    // -------------------

    public static function obtenerTodas() {
        $sql = "SELECT * FROM preguntas";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute();
        $preguntas = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categoria = null;
            if (!empty($fila['categoria_id'])) {
                $categoria = Categoria::obtenerPorId((int)$fila['categoria_id']);
            }
            $preguntas[] = new Pregunta((int)$fila['id'], $fila['pregunta'], $categoria);
        }
        return $preguntas;
    }

    public static function obtenerPorId(?int $id) {
        $sql = "SELECT * FROM preguntas WHERE id = ?";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            $categoria = null;
            if (!empty($resultado['categoria_id'])) {
                $categoria = Categoria::obtenerPorId((int)$resultado['categoria_id']);
            }
            return new Pregunta((int)$resultado['id'], $resultado['pregunta'], $categoria);
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

    public function getCategoria(): ?Categoria {
        return $this->categoria;
    }

    public function setId(?int $id) {
        $this->id = $id;
    }

    public function setTexto(?string $texto) {
        $this->texto = $texto;
    }

    public function setCategoria(?Categoria $categoria) {
        $this->categoria = $categoria;
    }
}
