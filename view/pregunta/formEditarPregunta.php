<?php
include "../../model/pregunta.class.php";

if (isset($_GET['id'])) {
    $pregunta = Preguntas::obtenerPorId($_GET['id']);
    if ($pregunta) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Pregunta</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Editar Pregunta</h2>
        <form name="formEditarPregunta" action="../../controller/pregunta.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar">

            <div class="form-group">
                <label for="id">Id de la Pregunta:</label>
                <input type="text" id="id" name="id" value="<?= htmlspecialchars($pregunta['id']); ?>" readonly/>
            </div>

            <div class="form-group">
                <label for="pregunta">Pregunta:</label>
                <input type="text" id="pregunta" name="pregunta" value="<?= htmlspecialchars($pregunta['pregunta']); ?>" required/>
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría ID:</label>
                <input type="number" id="categoria_id" name="categoria_id" value="<?= htmlspecialchars($pregunta['categoria_id']); ?>" required/>
            </div>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>

        <div class="actions">
            <a href="listarPregunta.php" class="btn btn-success">Volver</a>
        </div>
    </section>
</body>
</html>
<?php
    } else {
        print "El ID ingresado no es válido";
    }
} else {
    print "No se recibió un ID";
}
?>
