<?php
require_once("../../model/categoria.class.php");
$categorias = Categoria::obtenerTodas();
?>

<h2>Listado de Categorías</h2>
<div>
    <a href="formAltaCategoria.php">+ Nueva Categoría</a>
</div>
<table>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Acciones</th>
</tr>
<?php foreach ($categorias as $categoria) { ?>
<tr>
    <td><?= $categoria['id'] ?></td>
    <td><?= $categoria['nombre'] ?></td>
    <td>
        <!-- Botón de Editar -->
        <a href="formEditarCategoria.php?id=<?= $categoria['id'] ?>">Editar</a>

        <!-- Botón de Eliminar con formulario POST -->
        <form action="../../controller/categoria.controller.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
            <input type="hidden" name="operacion" value="eliminar">
            <button type="submit" onclick="return confirm('¿Seguro que querés eliminar esta categoría?')">Eliminar</button>
        </form>
    </td>
</tr>
<?php } ?>
</table>