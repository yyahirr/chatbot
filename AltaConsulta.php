<?php
// Incluye el archivo de conexión a la base de datos
include("conexion.php");
global $pdo;
$pdo->exec("USE chatbot");
$sql="INSERT INTO consulta (pregunta, respuesta, consultas) VALUES (:pregunta,:respuesta,:consultas)";
$stmt= $pdo->prepare($sql);
if($stmt->execute([
    'pregunta'=> $_POST['pregunta'],
    'respuesta'=> $_POST['respuesta'],
    'consultas'=> $_POST['consultas']
]) ) {
    echo "El registro se cargo correctamente";
}else{
    echo "El registro no pudo cargarse";
}
echo "<br/><a name='V   olver' href='ListarConsultas.php'>Volver</a>"

?>
