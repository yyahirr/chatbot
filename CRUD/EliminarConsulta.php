<?php
// Nos conectamos a la base de datos
include ("conexion.php");
// Armamos la consulta SQL
$sql="DELETE FROM consulta WHERE id=:id";
// Ejecutar consulta
$stmt= $pdo->prepare($sql);
if ($stmt-> execute([
    'id' => $_GET ['id']
]) ){
    echo "El registro se elimino correctamente";
}else{
    echo "El registro no se pudo eliminar";
}
echo "<a href='ListarConsultas.php'>Volver</a>";
?>