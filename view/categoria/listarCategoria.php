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
    </style>
</head>
<body>
    <section class="container">
        <h2 class="title">Listado de Conversaciones</h2>

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
