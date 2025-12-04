<?php
include "../../model/usuario.class.php";

if (isset($_GET['id'])) {
    $usuario = Usuario::obtenerPorId($_GET['id']); 
    if ($usuario) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Editar Usuario</h2>
        <form name="formEditarUsuario" action="../../controller/usuario.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar">

            <div class="form-group">
                <label for="id">Id del Usuario:</label>
                <input type="text" id="id" name="id" value="<?= htmlspecialchars($usuario['id']) ?>" readonly/>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required/>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required/>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" value="<?= htmlspecialchars($usuario['password']) ?>" required/>
            </div>

            <div class="form-group">
                <label for="rol_id">Rol ID:</label>
                <input type="number" id="rol_id" name="rol_id" value="<?= htmlspecialchars($usuario['rol_id']) ?>" required/>
            </div>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>

        <div class="actions">
            <a href="listarUsuario.php" class="btn btn-success">Volver</a>
        </div>
    </section>
</body>
</html>
<?php
    } else {
        print "El usuario no existe.";
    }
} else {
    print "El ID ingresado no es válido";
}
?>
