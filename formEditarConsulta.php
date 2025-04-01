<head>
<link rel="stylesheet" href="/chatbot/diseño/editarconsulta.css"/>
</head>

<?php
// Incluimos el archivo de conexión a la base de datos
include("conexion.php");

// Consulta SQL para seleccionar un registro específico por su ID
$sql = "SELECT * FROM registro_db WHERE id = (:id);";
?>

<!-- Formulario para editar una consulta existente -->
<form name="formEditarConsulta" method="Post" action="editarConsulta.php" method="POST">
    
    <!-- Campo para el ID (solo lectura) -->
    <label for="id">ID</label>
    <input type="text" name="id" readonly class="" /> <br/>

    <!-- Campo para la pregunta -->
    <label for="pregunta">Pregunta</label>
    <input type="text" name="pregunta" id="pregunta" class="" /> <br/>

    <!-- Campo para la respuesta -->
    <label for="respuesta">Respuesta</label>
    <input type="text" name="respuesta" id="respuesta" class="" /> <br/>

    <!-- Campo para la consulta -->
    <label for="consulta">Consulta</label>
    <input type="text" name="consulta" id="consulta" class="" /> <br/>

    <!-- Menú desplegable para seleccionar la categoría -->
    <label for="categoria">Categoría</label>
    <select name="categoria" id="categoria" class="">
        <option value="Seguridad">Seguridad</option>
        <option value="Compatibilidad">Conectividad</option>
        <option value="Hardware">Hardware</option>
        <option value="Software">Software</option>
        <option value="Sistema Operativo">Sistema Operativo</option>
    </select> <br/>

    <!-- Botón para enviar el formulario -->
    <input type="submit" value="Enviar pregunta"/>
</form>
