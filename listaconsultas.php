<?php
// Conectamos con la base de datos
include("conexion.php");

// Armamos la consulta  
$sql = "SELECT * FROM registro_db";

// Ejecutamos la consulta
$consultas = $pdo->query($sql);

// Mostramos datos provenientes de la base de datos
foreach ($consultas as $consulta) {
    echo "<b>Pregunta:</b> " . $consulta['pregunta'] . "<br/>";
    echo "<b>Respuesta:</b> " . $consulta['respuesta'] . "<br/>";
    echo "<b>Consulta:</b> " . $consulta['consulta'] . "<br/>";
    echo "<a name='actualizar' href='formEditarConsulta.php?id=" . $consulta['id'] . "'>Actualizar</a>";
    echo "<br/><br/>";
}
?>