<?php
include ("persona.class.php");

$persona1 = new Persona(47695013, "jose", "etcheverry", "1990-01-01");
$persona1->setDni("47695013");
$persona1->setNombre("jose");
$persona1->setApellido("etcheverry");
print "<br></br>"; 


var_dump($persona1);
print "<br></br>";

$persona1->presentacion();

?>