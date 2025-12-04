<?php
include "../../model/respuesta.class.php";
include "../../model/pregunta.class.php";

if (isset($_GET['id'])) {
    $respuesta = Respuesta::obtenerPorId((int)$_GET['id']);
    if ($respuesta) {
        // cargar preguntas para el selector
        $preguntas = Pregunta::obtenerTodas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Respuesta</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Editar Respuesta</h2>
        <form name="formEditarRespuesta" action="../../controller/respuesta.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($respuesta->getId()); ?>" />

            <div class="form-group">
                <label for="texto">Texto de la Respuesta:</label>
                <input type="text" id="texto" name="texto"
                       value="<?= htmlspecialchars($respuesta->getTexto()); ?>" required/>
            </div>

            <div class="form-group">
                <label for="pregunta_id">Pregunta asociada:</label>
                <select id="pregunta_id" name="pregunta_id">
                    <option value="">Sin pregunta</option>
                    <?php foreach ($preguntas as $preg): ?>
                        <option value="<?= htmlspecialchars($preg->getId()); ?>"
                            <?= ($respuesta->getPregunta() && $respuesta->getPregunta()->getId() === $preg->getId()) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($preg->getTexto()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>

        <div class="actions">
            <a href="listarRespuesta.php" class="btn btn-success">Volver</a>
        </div>
    </section>
</body>
</html>
<?php
    } else {
        echo "La respuesta no existe. <a href='listarRespuesta.php'>Volver</a>";
    }
} else {
    echo "No se recibió un ID válido. <a href='listarRespuesta.php'>Volver</a>";
}
?>
