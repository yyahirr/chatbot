<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Rol</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Alta de Rol</h2>
        <form name="formAltaRol" action="../../controller/rol.controller.php" method="POST">
            <input type="hidden" name="operacion" value="guardar"/>

            <div class="form-group">
                <label for="nombre">Nombre del Rol:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ej: Administrador"/>
            </div>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>
    </section>
</body>
</html>
