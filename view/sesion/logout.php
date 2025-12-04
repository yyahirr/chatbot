<?php
// Inicia la sesión para poder destruirla
session_start();

// Destruye todas las variables de sesión
session_unset();
session_destroy();

// Redirige al formulario de login
header("Location: formularioLogin.php");
exit;
?>
