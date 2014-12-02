<form class="center-form" action="index.php?rt=categoria/altaCategoria" method="POST">
    <fieldset>
    <legend>Categorias</legend>
    <label>Nombre</label>
    <input type="text" name="categoria[nombre]" placeholder="Nombre Categoria…">
    <span class="help-block">Escribe un nombre para la categoria.</span>
    <label>Descripcion</label>
    <input type="text" name="categoria[descripcion]" placeholder="Descripcion…">
    <span class="help-block">Escribe la descripcion.</span>
    <button type="submit" class="btn">Guardar</button>
    </fieldset>
</form>