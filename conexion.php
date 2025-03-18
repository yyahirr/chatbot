<?php
// Definir constantes para la conexión a la base de datos
define("SERVIDOR", "localhost"); // Dirección del servidor MySQL (localhost en este caso)
define("USUARIO", "root"); // Nombre de usuario de la base de datos
define("PASSWORD", "clave"); // Contraseña del usuario de la base de datos
define("DB", "nombre_base_de_datos"); // Nombre de la base de datos a la que se conectará

try {
    // Crear una nueva conexión PDO a la base de datos MySQL
    $pdo = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . DB . ";charset=utf8", USUARIO, PASSWORD);
    
    // Configurar PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    // Mensaje de éxito si la conexión es establecida correctamente
    echo "Conexión exitosa";
} catch (PDOException $e) {
    // Capturar y mostrar el mensaje de error en caso de falla en la conexión
    echo "Error de conexión: " . $e->getMessage();
}
?>


