<?php
// Conectamos con la base de datos
include("conexion.php");
// Armamos la consulta  
$sql="SELECT * FROM consulta";
// Ejecutamos la consulta
$consultas=$stmt= $pdo->query($sql);
// Mostramos datos provenientes de la base de datos
foreach ($consultas as $consulta) {
    echo "<b>Pregunta:</b> " . $consulta['pregunta'] . "<br/><br/>";
    echo "<b>Respuesta:</b> " . $consulta['respuesta'] . "<br/><br/>";
    echo "<b>Consulta:</b> " . $consulta['consultas'] . "<br/><br/>";  
    echo "<a name='actualizar' href='formEditarConsulta.php?id=" . $consulta['id'] . "'>Actualizar</a>";
    echo "<a name='eliminar' href='EliminarConsulta.php?id=" . $consulta['id'] . "'>Eliminar</a>";
    echo "<br></br>";
}
?>