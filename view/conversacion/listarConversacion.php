<?php
require_once("../../model/conversacion.class.php");
$conversaciones = Conversacion::obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Conversaciones</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        /* Estilos específicos para tablas */
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
            background: var(--color-success);
            color: #fff;
            transition: background 0.2s, transform 0.2s;
        }

        .actions a:hover {
            background: #218838;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <section class="container">
        <h2 class="title">Listado de Conversaciones</h2>

        <div class="actions">
            <a href="../../index.php">Ir al Chatbot</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Pregunta Usuario</th>
                <th>Respuesta Bot</th>
                <th>Fecha y Hora</th>
            </tr>
            <?php foreach ($conversaciones as $conversacion) { ?>
            <tr>
                <td><?= htmlspecialchars($conversacion['id']) ?></td>
                <td><?= htmlspecialchars($conversacion['pregunta_usuario']) ?></td>
                <td><?= htmlspecialchars($conversacion['respuesta_bot']) ?></td>
                <td><?= htmlspecialchars($conversacion['fecha_hora']) ?></td>
            </tr>
            <?php } ?>
        </table>
    </section>
</body>
</html>
