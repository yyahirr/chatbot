<?php
// Incluye el archivo de conexión a la base de datos
include("conexion.php");

$sql="INSERT INTO registro_db (pregunta, respuesta, consulta) VALUES (:pregunta,:respuesta,:consulta)";
$stmt= $pdo->prepare($sql);
$stmt->execute([
    'pregunta'=> $_POST['pregunta'],
    'respuesta'=> $_POST['respuesta'],
    'consulta'=> $_POST['consulta']
]); 

?>
