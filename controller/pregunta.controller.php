<?php
include_once('../model/pregunta.class.php');

$operacion = $_POST['operacion'] ?? null;
$result = null;

if ($operacion == "guardar") {
    $categoria = Categoria::obtenerPorId($_POST['categoria_id']);
    $pregunta = new Pregunta(null, $_POST['pregunta'], $categoria);
    $result = $pregunta->guardar();

} elseif ($operacion == "actualizar") {
    $categoria = Categoria::obtenerPorId($_POST['categoria_id']);
    $pregunta = new Pregunta($_POST['id'], $_POST['pregunta'], $categoria);
    $result = $pregunta->actualizar();

} elseif ($operacion == "eliminar") {
    $pregunta = new Pregunta($_POST['id'], null, null);
    $result = $pregunta->eliminar();
}

if ($result) {
    echo "<br>Operación realizada con éxito.</b><br>";
} else {
    echo "<br>Error al realizar la operación.</b><br>";
}
echo "<a href='../view/pregunta/listarPregunta.php'>Volver a la lista de preguntas</a>";
?>

