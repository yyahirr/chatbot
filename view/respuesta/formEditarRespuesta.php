<?php
include "../../model/respuesta.class.php";

if (isset($_GET['id'])) {
    $respuesta = Respuesta::obtenerPorId($_GET['id']);
    if ($respuesta) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Respuesta</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Editar Respuesta</h2>
        <form name="formEditarRespuesta" action="../../controller/respuesta.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar">

            <div class="form-group">
                <label for="id">Id de la Respuesta:</label>
                <input type="text" id="id" name="id" value="<?= htmlspecialchars($respuesta[0]['id']); ?>" readonly/>
            </div>

            <div class="form-group">
                <label for="respuesta">Texto de la Respuesta:</label>
                <input type="text" id="respuesta" name="respuesta" value="<?= htmlspecialchars($respuesta[0]['respuesta']); ?>" required/>
            </div>

            <div class="form-group">
                <label for="pregunta_id">Pregunta ID:</label>
                <input type="number" id="pregunta_id" name="pregunta_id" value="<?= htmlspecialchars($respuesta[0]['pregunta_id']); ?>" required/>
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
        print "El ID ingresado no es válido";
    }
} else {
    print "No se recibió un ID";
}
?>
