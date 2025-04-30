<?php 
include 'conexion.php'; // Conexión a la base de datos


$mensaje= $_POST['text'] ?? ''; // Recibe el mensaje del usuario desde el POST

$sql = "SELECT respuesta FROM consulta WHERE pregunta LIKE :pregunta ";// Prepara la consulta SQL
$stmt = $pdo->prepare($sql); // Prepara la consulta
$stmt-> execute(['pregunta' => "%$mensaje%"]); // Ejecuta la consulta con el mensaje del usuario
if($stmt->rowCount() > 0){ // Verifica si hay resultados
    $fetch_data= $stmt->fetch(PDO::FETCH_ASSOC); // Obtiene la respuesta
    $respuesta= $fetch_data['respuesta']; // Almacena la respuesta en una variable
    echo $respuesta; // Muestra la respuesta al usuario
}else{
    echo "Lo siento, no tengo una respuesta para esa pregunta."; // Mensaje por defecto si no hay respuesta
}
?>
