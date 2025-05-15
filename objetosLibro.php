<?php
include ("libroClass.php"); // Incluye la clase Libro

$libro1 = new Libro("Rebelion en la granja", "George Orwell", "1945-08-17", "DeBolsillo"); // Instancia de la clase Libro

print "<br>></br>";

var_dump($libro1); // Muestra la información del objeto
print "<br></br>";

$libro1->presentacion(); // Presentación del libro

?>