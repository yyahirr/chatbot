<?php
include "../../model/categoria.class.php";
if (isset($_GET['id'])) {
    $categoria = Categoria::obtenerPorId($_GET['id']);
    if ($categoria) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Editar Categoría</h2>
        <form name="formEditarCategoria" action="../../controller/categoria.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar">

            <div class="form-group">
                <label for="id">Id de la Categoría:</label>
                <input type="text" id="id" name="id" value="<?= $categoria['id']; ?>" readonly/>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre de la Categoría:</label>
                <input type="text" id="nombre" name="nombre" value="<?= $categoria['nombre']; ?>" required/>
            </div>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>

        <div class="actions">
            <a href="listarCategoria.php" class="btn btn-success">Volver</a>
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
