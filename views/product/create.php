<div class="fixed-content">
    <div class="col-sm-6 margenes">
        <form class="center-form" enctype="multipart/form-data" action="index.php?rt=product/altaProducto" method="POST">
            <fieldset>
            <legend>Producto Nuevo</legend>
            <label>Nombre</label>
            <input type="text" name="items[nombre]" placeholder="Nombre Categoria">
            <span class="help-block">Escribe un nombre para la categoria.</span>
            <label>Descripcion</label>
            <input type="text" name="items[descripcion]" placeholder="Descripcion">
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
            <label>Imagen</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <label>Precio</label>
                <input type="number" name="items[precio]" placeholder="Precio">
            <span class="help-block">Precio del producto</span>

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
                <th>Precio Unidad</th>
                <th>#</th>
            </tr>
            <?php
            foreach ($productos as $key => $producto) {
                    $name = $producto['nombre'];
                    $id = $producto['id_producto'];
                    $price = $producto['precio'];
                    $description = $producto['descripcion'];
            ?> 
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $description; ?></td>
                <td><?php echo $price; ?></td>
                <td>#</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>