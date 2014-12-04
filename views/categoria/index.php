<div class="fixed-content">
    <div class="col-sm-6 margenes">
        <form class="center-form" action="index.php?rt=categoria/altaCategoria" method="POST">
            <fieldset>
            <legend>Categorias</legend>
            <label>Nombre</label>
            <input type="text" name="categoria[nombre]" placeholder="Nombre Categoria">
            <span class="help-block">Escribe un nombre para la categoria.</span>
            <label>Descripcion</label>
            <input type="text" name="categoria[descripcion]" placeholder="Descripcion">
            <span class="help-block">Escribe la descripcion.</span>
            <button type="submit" class="btn">Guardar</button>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-6 margenes pull-right">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>#</th>
            </tr>
            <?php
            foreach ($categorias as $key => $cat) {
                    $id = $cat['id_categoria'];
                    $name = $cat['nombre'];
                    $desc = $cat['descripcion'];
            ?>  
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $desc; ?></td>
                <td>#</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>