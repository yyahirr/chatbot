<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../../model/respuesta.class.php");
$respuestas = Respuesta::obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Respuestas</title>
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
        <h2 class="title">Listado de Respuestas</h2>

        <div class="actions">
            <a href="formAltaRespuesta.php">+ Nueva Respuesta</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Respuesta</th>
                <th>ID Pregunta</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($respuestas as $respuesta) { ?>
            <tr>
                <td><?= htmlspecialchars($respuesta['id']) ?></td>
                <td><?= htmlspecialchars($respuesta['respuesta']) ?></td>
                <td><?= htmlspecialchars($respuesta['pregunta_id']) ?></td>
                <td>
                    <!-- Botón de Editar -->
                    <a href="formEditarRespuesta.php?id=<?= $respuesta['id'] ?>" class="btn-edit">Editar</a>

                    <!-- Botón de Eliminar con formulario POST -->
                    <form action="../../controller/respuesta.controller.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $respuesta['id'] ?>">
                        <input type="hidden" name="operacion" value="eliminar">
                        <button type="submit" class="btn-delete" onclick="return confirm('¿Seguro que querés eliminar esta respuesta?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </section>
</body>
</html>
