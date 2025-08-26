<?php
include_once "../model/database.class.php";
include_once "../model/pregunta.class.php";
include_once "../model/respuesta.class.php";

// Recibimos el mensaje del usuario vía POST
$mensajeUsuario = trim($_POST['mensaje'] ?? "");

// Inicializamos la respuesta del bot
$respuestaBot = "No entendí tu pregunta 🤔";

// Buscar la pregunta exacta (o podés implementar búsqueda más avanzada)
$preguntas = Preguntas::obtenerTodas();
$preguntaEncontrada = null;

foreach ($preguntas as $p) {
    if (strcasecmp($p['pregunta'], $mensajeUsuario) === 0) {
        $preguntaEncontrada = $p;
        break;
    }
}

if ($preguntaEncontrada) {
    $respuestas = Respuesta::obtenerPorId($preguntaEncontrada['id']);
    if ($respuestas && count($respuestas) > 0) {
        $respuestaBot = $respuestas[0]['respuesta'];
    }
}


// 🔹 Guardar la conversación usando tu controller existente
$_POST['operacion'] = 'guardar';
$_POST['pregunta_usuario'] = $mensajeUsuario;
$_POST['respuesta_bot'] = $respuestaBot;

include_once "conversacion.controller.php";

// 🔹 Devolver respuesta al frontend como JSON
echo json_encode([
    "usuario" => $mensajeUsuario,
    "bot" => $respuestaBot
]);
