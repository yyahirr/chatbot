<?php
include ("../model/conversacion.class.php");

$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : null;
$result = null;

if ($operacion == "guardar") {
    $conversacion = new Conversaciones(null, $_POST['pregunta_usuario'], $_POST['respuesta_bot'], date('Y-m-d H:i:s'));
    $result = $conversacion->guardar();
}
if ($result) {
    print "<br>Operación realizada con éxito.</b><br>";
} else {
    print "<br>Error al realizar la operación.</b><br>";
}
print "<a href='../formularios/listarConversacion.php'>Volver a la lista de conversaciones</a>";

?>