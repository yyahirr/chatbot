<?php
require_once("../../model/usuario.class.php");
$usuarios = Usuario::obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: var(--color-primary);
            color: #fff;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        tr:hover {
            background-color: #eef2f7;
        }
        .actions {
            text-align: center;
            margin-bottom: 15px;
        }
        .actions a {
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            background: var(--color-accent);
            color: #fff;
            transition: background 0.2s, transform 0.2s;
        }
        .actions a:hover {
            background: #005a9e;
            transform: translateY(-2px);
        }
        .btn-edit {
            background: var(--color-success);
            color: #fff;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            transition: background 0.2s, transform 0.2s;
        }
        .btn-edit:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        .btn-delete {
            background: var(--color-danger);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }
        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <section class="container">
        <h2 class="title">Listado de Usuarios</h2>

        <div class="actions">
            <a href="formAltaUsuario.php">+ Nuevo Usuario</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            <?php if ($usuarios) { foreach ($usuarios as $usuario){ ?>
            <tr>
                <td><?= htmlspecialchars($usuario['id']) ?></td>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= htmlspecialchars($usuario['email']) ?></td>
                <td>
                    <!-- Botón de Editar -->
                    <a href="formEditarUsuario.php?id=<?= $usuario['id'] ?>" class="btn-edit">Editar</a>

                    <!-- Botón de Eliminar con formulario POST -->
                    <form action="../../controller/usuario.controller.php" method="POST" style="display:inline;">
                        <input type="hidden" name="operacion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que querés eliminar este usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php }} ?>
        </table>
    </section>
</body>
</html>
