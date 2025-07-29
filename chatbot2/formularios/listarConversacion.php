<?php
require_once("../model/conversacion.class.php");
$conversaciones = Conversaciones::obtenerTodas();
?>

<h2 style="text-align: center;">Listado de Conversaciones</h2>
<div style="text-align: center; margin-bottom: 10px;">
    <a href="formAltaConversacion.php">+ Nueva Conversación</a>
</div>
<table>
<tr>
    <th>ID</th>
    <th>Pregunta Usuario</th>
    <th>Respuesta Bot</th>
    <th>Fecha</th>
    <th>Acciones</th>
</tr>
<?php foreach ($conversaciones as $conversacion) { ?>
<tr>
    <td><?= $conversacion['id'] ?></td>
    <td><?= $conversacion['pregunta_usuario'] ?></td>
    <td><?= $conversacion['respuesta_bot'] ?></td>
    <td><?= $conversacion['fecha'] ?></td>
<?php } ?>
