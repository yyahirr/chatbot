<?php
// Incluye el archivo de conexión a la base de datos
include("conexion.php");
global $pdo;
$pdo->exec("USE chatbot");

// Validar que los campos no estén vacíos
if (isset($_POST['pregunta'], $_POST['respuesta'], $_POST['consultas']) && 
    !empty($_POST['pregunta']) && !empty($_POST['respuesta']) && !empty($_POST['consultas'])) {

    // Preparar la consulta SQL de inserción
    $sql = "INSERT INTO consulta (pregunta, respuesta, consultas) VALUES (:pregunta, :respuesta, :consultas)";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta con los datos del formulario
    if ($stmt->execute([
        'pregunta' => $_POST['pregunta'],
        'respuesta' => $_POST['respuesta'],
        'consultas' => $_POST['consultas']
    ])) {
        echo "El registro se cargó correctamente";
    } else {
        echo "El registro no pudo cargarse";
    }
} else {
    echo "Por favor, complete todos los campos.";
}

echo "<br/><a name='Volver' href='ListarConsultas.php'>Volver</a>";
?>
