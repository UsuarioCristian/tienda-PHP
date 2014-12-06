<div class="fixed-content">
    <div class="col-sm-6 margenes">
        <form class="center-form" action="index.php?rt=product/ingresoStock" method="POST">
            <fieldset>
            <legend>Ingreso de Stock</legend>
            <label>Producto</label>
            <select name="stock[id_producto]" class="input-medium form-control">
              <?php
                foreach ($productos as $key => $producto) {
                        $id = $producto['id_producto'];
                        $name = $producto['nombre'];
                ?>  
                        <?php echo '<option value="'.$id.'" >'.$id.' - '.$name.'</option>';
                }
                ?>
            </select>
            <label>Cantidad</label>
            <input type="number" name="stock[stock]" placeholder="Cantidad">
            <span class="help-block">Cantidad que ingresa a stock.</span>
            <button type="submit" class="btn">Guardar</button>
            </fieldset>
        </form>
    </div>
    <div class="col-sm-6 margenes pull-right">
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Stock</th>
                <th>#</th>
            </tr>
            <?php
            foreach ($prodstock as $key => $prod) {
                    $id = $prod['id_producto'];
                    $name = $prod['nombre'];
                    $stock = $prod['stock'];
            ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $stock; ?></td>
                <td>#</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>