<?php
include "../../model/usuario.class.php";

if (isset($_GET['id'])) {
    $usuario = Usuario::obtenerPorId((int)$_GET['id']); 
    if ($usuario) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .container {
            max-width: 720px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .title {
            text-align: center;
            font-size: 26px;
            margin-bottom: 25px;
            color: #333;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .btn-primary {
            background: #007bff;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-success {
            background: #28a745;
            color: #fff;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .btn-primary:hover, .btn-success:hover {
            filter: brightness(0.95);
        }
    </style>
</head>
<body>
    <section class="container">
        <h2 class="title">Editar Usuario</h2>
        <form name="formEditarUsuario" action="../../controller/usuario.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()) ?>" />

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario->getNombre()) ?>" required/>
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario->getEmail()) ?>" required/>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" value="<?= htmlspecialchars($usuario->getPassword()) ?>" required/>
            </div>

            <div class="form-group">
                <label for="rol_id">Rol ID:</label>
                <input type="number" id="rol_id" name="rol_id" value="<?= htmlspecialchars($usuario->getRolId()) ?>" required/>
            </div>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>

        <a href="listarUsuario.php" class="btn btn-success">Volver</a>
    </section>
</body>
</html>
<?php
    } else {
        echo "El usuario no existe. <a href='listarUsuario.php'>Volver</a>";
    }
} else {
    echo "El ID ingresado no es válido. <a href='listarUsuario.php'>Volver</a>";
}
?>
