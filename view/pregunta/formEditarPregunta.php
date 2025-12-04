<?php
// Usar require_once para evitar duplicados
require_once "../../model/pregunta.class.php";

if (isset($_GET['id'])) {
    $pregunta = Pregunta::obtenerPorId((int)$_GET['id']); 
    if ($pregunta) {
        $categorias = Categoria::obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Pregunta</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Editar Pregunta</h2>
        <form name="formEditarPregunta" action="../../controller/pregunta.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($pregunta->getId()); ?>">

            <div class="form-group">
                <label for="pregunta">Pregunta:</label>
                <input type="text" id="pregunta" name="pregunta"
                       value="<?= htmlspecialchars($pregunta->getTexto()); ?>" required/>
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría:</label>
                <select id="categoria_id" name="categoria_id">
                    <option value="">Sin categoría</option>
                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?= htmlspecialchars($cat->getId()); ?>"
                            <?= ($pregunta->getCategoria() && $pregunta->getCategoria()->getId() === $cat->getId()) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat->getNombre()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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
        echo "El ID ingresado no es válido <a href='listarPregunta.php'>Volver</a>";
    }
} else {
    echo "No se recibió un ID <a href='listarPregunta.php'>Volver</a>";
}
?>
