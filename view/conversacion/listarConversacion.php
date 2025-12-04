<?php
require_once("../../model/conversacion.class.php");
$conversaciones = Conversacion::obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Conversaciones</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Listado de Conversaciones</h2>

        <div class="actions">
            <a href="../../index.php">Ir al Chatbot</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Pregunta Usuario</th>
                <th>Respuesta Bot</th>
                <th>Fecha y Hora</th>
            </tr>
            <?php foreach ($conversaciones as $conversacion) { ?>
            <tr>
                <td><?= htmlspecialchars($conversacion->getId()) ?></td>
                <td><?= htmlspecialchars($conversacion->getPreguntaUsuario()) ?></td>
                <td><?= htmlspecialchars($conversacion->getRespuestaBot()) ?></td>
                <td><?= htmlspecialchars($conversacion->getFechaHora()) ?></td>
            </tr>
            <?php } ?>
        </table>
    </section>
</body>
</html>
