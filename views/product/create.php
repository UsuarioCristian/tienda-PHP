<form class="center-form" action="index.php?rt=product/altaProducto" method="POST">
    <fieldset>
    <legend>Producto Nuevo</legend>
    <label>Nombre</label>
    <input type="text" name="items[nombre]" placeholder="Nombre Categoria…">
    <span class="help-block">Escribe un nombre para la categoria.</span>
    <label>Descripcion</label>
    <input type="text" name="items[descripcion]" placeholder="Descripcion…">
    <span class="help-block">Escribe la descripcion.</span>
    <select name="items[id_categoria]" class="input-medium form-control">
      <?php
        foreach ($categorias as $key => $categoria) {
                $id = $categoria['id_categoria'];
                $name = $categoria['nombre'];
        ?>  
                <?php echo '<option value="'.$id.'" >'.$name.'</option>';
        }
        ?>
    </select>
    <label>Precio</label>
        <input type="number" name="items[precio]" placeholder="Precio">
    <span class="help-block">Precio del producto</span>

    <button type="submit" class="btn">Guardar</button>
    
    </fieldset>
</form>