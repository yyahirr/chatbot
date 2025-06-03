<?php
include ("persona.class.php");

$persona1 = new Persona(47695013, "jose", "etcheverry", "1990-01-01");

print "<br>></br>"; 


var_dump($persona1);
print "<br></br>";

$persona1->presentacion();

?>