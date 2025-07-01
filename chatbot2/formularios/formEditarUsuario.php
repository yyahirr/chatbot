<?php
include "../model/usuario.class.php";

if (isset($_GET['id'])) {
    $usuario = new Usuario();
    $usuario = $usuario->obtenerPorId($_GET['id']);
    if ($usuario) {
?>

<h2>Editar Usuario</h2>
<form name="formEditarUsuario" action="../controller/usuario.controller.php" method="POST">
    <input type="hidden" name="operacion" value="actualizar">
    <label>Id del Usuario:</label>
    <input type="text" name="id" value="<?=$usuario['id'];?>" readonly /><br><br>
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?=$usuario['nombre'];?>" required /><br><br>
    <label>Correo electrónico:</label>
    <input type="email" name="email" value="<?=$usuario['email'];?>" required /><br><br>
    <label>Contraseña:</label>
    <input type="password" name="contrasena" value="<?=$usuario['password'];?>" required /><br><br>

    <label>Rol:</label>
    <input type="number" name="rol_id" value="<?=$usuario['rol_id'];?>" /><br><br>

    <input type="submit" value="Aceptar" />
</form>

<?php
    echo "<a href='listarUsuario.php'>Volver</a>";
    } else {
        print "El usuario no existe.";
    }
} else {
    print "El ID ingresado no es válido";
}
?>