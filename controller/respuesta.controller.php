<?php
require_once("../model/respuesta.class.php");
require_once("../model/pregunta.class.php");

$operacion = $_POST['operacion'] ?? null;
$result = null;

if ($operacion == "guardar") {
    $pregunta = Pregunta::obtenerPorId($_POST['pregunta_id']);
    $respuesta = new Respuesta(null, $_POST['respuesta'], $pregunta);
    $result = $respuesta->guardar();

} elseif ($operacion == "actualizar") {
    $pregunta = Pregunta::obtenerPorId($_POST['pregunta_id']);
    $respuesta = new Respuesta($_POST['id'], $_POST['respuesta'], $pregunta);
    $result = $respuesta->actualizar();

} elseif ($operacion == "eliminar") {
    $respuesta = new Respuesta($_POST['id'], null, null);
    $result = $respuesta->eliminar();
}

if ($result) {
    echo "<br>Operación realizada con éxito.</b><br>";
} else {
    echo "<br>Error al realizar la operación.</b><br>";
}
echo "<a href='../view/respuesta/listarRespuesta.php'>Volver a la lista de respuestas</a>";
?>
