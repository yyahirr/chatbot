<?php
include_once 'database.class.php';

if (!class_exists('Categoria')) {
    class Categoria {
        private ?int $id;
        private ?string $nombre;
        private $conexion;

        public function __construct(?int $id = null, ?string $nombre = null) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->conexion = Database::getInstance()->getConnection();
        }

        // MÉTODOS CRUD
        public function guardar(): bool {
            $sql = "INSERT INTO categoria (nombre) VALUES (?)";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([$this->nombre]);
        }

        public function actualizar(): bool {
            $sql = "UPDATE categoria SET nombre = ? WHERE id = ?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([$this->nombre, $this->id]);
        }

        public function eliminar(): bool {
            $sql = "DELETE FROM categoria WHERE id = ?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([$this->id]);
        }

        // MÉTODOS ESTÁTICOS
        public static function obtenerTodas(): array {
            $sql = "SELECT * FROM categoria";
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute();
            $categorias = [];
            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorias[] = new Categoria((int)$fila['id'], $fila['nombre']);
            }
            return $categorias;
        }

        public static function obtenerPorId(?int $id): ?Categoria {
            $sql = "SELECT * FROM categoria WHERE id = ?";
            $stmt = Database::getInstance()->getConnection()->prepare($sql);
            $stmt->execute([$id]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultado) {
                return new Categoria((int)$resultado['id'], $resultado['nombre']);
            }
            return null;
        }

        // GETTERS & SETTERS
        public function getId(): ?int {
            return $this->id;
        }

        public function getNombre(): ?string {
            return $this->nombre;
        }

        public function setId(?int $id): void {
            $this->id = $id;
        }

        public function setNombre(?string $nombre): void {
            $this->nombre = $nombre;
        }
    }
}
