<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Pregunta</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Alta de Pregunta</h2>
        <form action="../../controller/pregunta.controller.php" method="POST">
            <input type="hidden" name="operacion" value="guardar">

            <div class="form-group">
                <label for="pregunta">Pregunta:</label>
                <input type="text" id="pregunta" name="pregunta" required placeholder="Escribe tu pregunta aquí"/>
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría ID:</label>
                <input type="number" id="categoria_id" name="categoria_id" required placeholder="Ej: 1"/>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Pregunta</button>
        </form>
    </section>
</body>
</html>
