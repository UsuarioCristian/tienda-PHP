<form class="center-form" enctype="multipart/form-data" action="index.php?rt=oferta/altaOferta" method="POST">
    <fieldset>
    <legend>Nueva Oferta</legend>
    
    <label>Descripcion</label>
    <input type="text" name="items[descripcion]" placeholder="Descripcion">
    <span class="help-block">Escribe la descripcion.</span>
    <select name="items[id_producto]" class="input-medium form-control">
      <?php
        foreach ($productos as $key => $producto) {
                $id = $producto['id_producto'];
                $name = $producto['nombre'];
        ?>  
                <?php echo '<option value="'.$id.'" >'.$name.'</option>';
        }
        ?>
    </select>    
    <label>Descuento</label>
        <input type="number" name="items[descuento]" placeholder="Precio">
    <span class="help-block">Descuento del producto</span>

    <button type="submit" class="btn">Guardar</button>
    
    </fieldset>
</form>