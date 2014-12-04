<div id="sticky-anchor"></div>
<div id="sticky"><div class="cart">
        <h3 class="cart-title">Shopping Cart</h3>
        <div style="background:#fff">
        <table id="cartcontent" fitColumns="true" style="width:100%;">
            <thead>
                <tr>
                    <th field="name" width=100>Name</th>
                    <th field="quantity" width=60 align="right">Quantity</th>
                    <th field="price" width=60 align="right">Price</th>
                </tr>
            </thead>
        </table>
        </div>
        <p class="total">Total: $0</p>
<input type="button" name='EnviarPedido' class='enviarPedido' value='Comprar'></input>
</div></div>

<ul class="products">
<?php
foreach ($productos as $key => $producto) {
		$img_url = 'application/public/images/products/'.$producto['img'];
		$name = $producto['nombre'];
		$id = $producto['id_producto'];
		$price = $producto['precio'];
		$description = $producto['descripcion'];
?>	
<li>	
<div class="content-fixed col-sm-4 col-lg-4 col-md-4">
		<button type="button" onclick= "location.href = 'index.php?rt=product/view&id=<?php echo $id; ?>'" class="btn btn-info">Info</button>
		<div class="thumbnail-drop">
			<?php echo "<img src=".$img_url.' />'; ?>
			<div class="caption">
				<h4 class="pull-right" 	style="display: inline;">$<p><?php echo $price; ?></p></h4>
				<h4><a href="#"><p><?php echo $name; ?></p></a>
				</h4>
				<p><?php echo $description; ?></p>

			</div>
		</div>
</div>
</li>


<?php
}
?>
</ul>
