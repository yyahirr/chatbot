<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Categoría</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Alta de Categoría</h2>
        <form name="formAltaCategoria" action="../../controller/categoria.controller.php" method="POST">
            <input type="hidden" name="operacion" value="guardar"/>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej: Tecnología"/>
            </div>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
    </section>
</body>
</html>
