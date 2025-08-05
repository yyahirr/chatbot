<?php
include_once 'model/database.class.php';

if (isset($_POST['text'])) {
    $preguntaUsuario = trim($_POST['text']);
    $conexion = Database::getConnection();

    // Buscar pregunta exacta (puedes usar LIKE para mayor flexibilidad)
    $sql = "SELECT r.respuesta 
            FROM preguntas p 
            JOIN respuesta r ON p.id = r.pregunta_id 
            WHERE LOWER(p.pregunta) = LOWER(?) 
            LIMIT 1";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([$preguntaUsuario]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && !empty($row['respuesta'])) {
        echo $row['respuesta'];
    } else {
        echo "No puedo responder a esa pregunta.";
    }
}
?>