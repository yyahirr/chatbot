<?php
include "../../model/rol.class.php";
if (isset($_GET['id'])) {
    $rol = Rol::obtenerPorId($_GET['id']);
    if ($rol) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Rol</title>
    <!-- Enlace al CSS global -->
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <section class="container">
        <h2 class="title">Editar Rol</h2>
        <form name="formEditarRol" action="../../controller/rol.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar">

            <div class="form-group">
                <label for="id">Id del Rol:</label>
                <input type="text" id="id" name="id" value="<?= htmlspecialchars($rol->getId()); ?>" readonly/>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre del Rol:</label>
                <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($rol->getNombre()); ?>" required/>
            </div>

            <button type="submit" class="btn btn-primary">Aceptar</button>
        </form>

        <div class="actions">
            <a href="listarRol.php" class="btn btn-success">Volver</a>
        </div>
    </section>
</body>
</html>
<?php
    } else {
        print "El rol no existe.";
    }
} else {
    print "El ID ingresado no es válido";
}
?>
