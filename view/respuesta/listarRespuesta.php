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
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        :root {
            --color-primary: #007bff;
            --color-success: #28a745;
            --color-danger: #dc3545;
            --color-accent: #0069d9;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .title {
            text-align: center;
            font-size: 28px;
            margin-bottom: 25px;
            color: #333;
        }

        .actions {
            text-align: right;
            margin-bottom: 15px;
        }

        .actions a {
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 6px;
            background: var(--color-success);
            color: #fff;
            font-weight: 500;
            transition: background 0.2s, transform 0.2s;
        }

        .actions a:hover {
            background: #218838;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
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

        .btn-edit, .btn-delete {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            margin-right: 5px;
        }

        .btn-edit {
            background: var(--color-success);
            color: #fff;
        }

        .btn-edit:hover {
            background: #218838;
        }

        .btn-delete {
            background: var(--color-danger);
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #c82333;
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
                <td><?= htmlspecialchars($respuesta->getId()) ?></td>
                <td><?= htmlspecialchars($respuesta->getTexto()) ?></td>
                <td>
                    <?= $respuesta->getPregunta()
                        ? htmlspecialchars($respuesta->getPregunta()->getId())
                        : '<em>Sin pregunta</em>' ?>
                </td>
                <td>
                    <a href="formEditarRespuesta.php?id=<?= $respuesta->getId() ?>" class="btn-edit">Editar</a>
                    <form action="../../controller/respuesta.controller.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $respuesta->getId() ?>">
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
