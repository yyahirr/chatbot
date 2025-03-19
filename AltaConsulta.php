<?php
// Incluye el archivo de conexión a la base de datos
include("conexion.php");

// Define la consulta SQL para seleccionar todos los registros de la tabla "mensajes"
$sql = "SELECT * FROM mensajes";

// Ejecuta la consulta y almacena el resultado en la variable $stmt
$stmt = $pdo->query($sql);

// Obtiene todos los registros de la consulta en un array asociativo
$mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Recorre cada mensaje obtenido de la base de datos
foreach ($mensajes as $mensaje) {
    // Muestra el usuario y el mensaje en pantalla con un salto de línea
    echo "Usuario: " . $mensaje['usuario'] . " - mensaje: " . $mensaje['mensaje'] . "<br>";
    // Nota: Había un error en tu código, usaste `- "<br>"` en lugar de `. "<br>"`.
}

?>
