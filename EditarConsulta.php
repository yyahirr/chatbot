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