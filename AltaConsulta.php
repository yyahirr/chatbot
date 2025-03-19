<?php
include ("conexion.php");

$sql = "SELECT * FROM mensajes";
$stmt = $pdo->query($sql);
$mensajes = $stmt->fetchALL(PDO::FETCH_ASSOC);
foreach ($mensajes as $mensaje) {
    echo "Usuario: " . $mensaje['usuario'] . " - mensaje: " . $mensaje['mensaje'] - "<br>";
}

?>
