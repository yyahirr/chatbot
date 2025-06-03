<?php
// Nos conectamos con la base de datos
include("conexion.php");
// Armar consulta SQL
$sql="UPDATE consulta SET pregunta=:pregunta, respuesta =:respuesta, consultas=:consultas WHERE id=:id";
// Ejecutar consulta
$stmt= $pdo->prepare($sql);
if ($stmt-> execute([
    'pregunta'=> $_POST['pregunta'],
    'respuesta'=> $_POST['respuesta'],
    'consultas'=> $_POST['consultas'],
    'id' => $_POST['id']
]) ){
    echo "El registro se modifico correctamente";
}else{
    echo "El registro no se pudo modificar";
}
echo "<a href='ListarConsultas.php'>Volver</a>";
?>

<head>
<link rel="stylesheet" href="/chatbot/diseño/editarconsulta.css"/>
</head>

<?php
// Incluimos el archivo de conexión a la base de datos
include('conexion.php');

// Consulta SQL para seleccionar un registro específico por su ID
$sql = 'SELECT * FROM consulta WHERE id=:id';
$stmt= $pdo->prepare($sql);
$stmt->execute( ['id' => $_GET['id']]);
if($consulta = $stmt-> fetch(PDO::FETCH_ASSOC) ) {


?>

<!-- Formulario para editar una consulta existente -->
<form name="formEditarConsulta" method="Post" action="editarConsulta.php" method="POST">
    
    <!-- Campo para el ID (solo lectura) -->
    <label for="id">id</label>
    <input type="text" name="id" value="<?=$consulta['id'];?>"readonly class="" /> <br/>

    <!-- Campo para la pregunta -->
    <label for="pregunta">Pregunta</label>
    <input type="text" name="pregunta" value="<?=$consulta['pregunta'];?>"/> <br/>

    <!-- Campo para la respuesta -->
    <label for="respuesta">Respuesta</label>
    <input type="text" name="respuesta" value="<?=$consulta['respuesta'];?>"/> <br/>

    <!-- Menú desplegable para seleccionar la categoría -->
    <label for="consultas">Consultas</label>
    <select name="consultas" id="consultas" class="">
        <option value="Seguridad">Seguridad</option>
        <option value="Compatibilidad">Conectividad</option>
        <option value="Hardware">Hardware</option>
        <option value="Software">Software</option>
        <option value="Sistema Operativo">Sistema Operativo</option>
    </select> <br/>

    <!-- Botón para enviar el formulario -->
    <input type="submit" value="Enviar pregunta"/>
</form>
<?php
}else{
    echo "el registro seleccionado no existe";
    echo "<a href='ListarConsultas.php'>Volver</a>";
}
?>
