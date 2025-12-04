<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Respuesta</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Alta de Respuesta</h2>
        <form action="../../controller/respuesta.controller.php" method="POST">
            <input type="hidden" name="operacion" value="guardar">

            <div class="form-group">
                <label for="respuesta">Respuesta:</label>
                <input type="text" id="respuesta" name="respuesta" required placeholder="Escribe la respuesta aquí"/>
            </div>

            <div class="form-group">
                <label for="pregunta_id">Pregunta ID:</label>
                <input type="number" id="pregunta_id" name="pregunta_id" required placeholder="Ej: 10"/>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Respuesta</button>
        </form>
    </section>
</body>
</html>
