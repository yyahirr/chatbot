<!--link del css-->
<head>
<link rel="stylesheet" href="/chatbot/diseño/formulario.css"/>
</head>
<!--formulario para dar de alta la consulta-->
<form name="formAltaConsulta" method="POST" action="AltaConsulta.php">
    <!--etiqueta de pregunta-->
    <label> Pregunta </label>
        <input type="text" name="pregunta" class="pregunta"/><br/>
    <!--etiqueta de respuesta-->
        <label> Respuesta </label>
        <input type="text" name="respuesta" class="respuesta"/><br/>
    <!--lista desplegable para seleccionar-->
        <select name="consulta">
    <!--categorias de la lista-->
            <option value="Sistema Operativo">Sistema operativo</option>
            <option value="Software">Software</option>
            <option value="Hardware">Hardware</option>
            <option value="Conectividad">Conectividad</option>
            <option value="Seguridad">Seguridad</option>
        </select>
    <!--boton para enviar los datos introducidos del formulario-->
        <input type="submit" value="Aceptar" />
</form>


        

