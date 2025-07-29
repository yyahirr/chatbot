<h2>Alta de conversación</h2>

<form action="../controller/conversacion.controller.php" method="POST">
    <input type="hidden" name="operacion" value="guardar">
    <label for="pregunta_usuario">Pregunta del usuario:</label>
    <input type="text" id="pregunta_usuario" name="pregunta_usuario" required><br><br>
    <label for="respuesta_bot">Respuesta del bot:</label>
    <input type="text" id="respuesta_bot" name="respuesta_bot" required><br><br>
    <button type="submit">Guardar Conversación</button>
</form>