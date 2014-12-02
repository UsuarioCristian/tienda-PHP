<ul class="products">
<?php
foreach ($productos as $key => $producto) {
		//$img_url = 'application/public/images/products/'.$producto['img'];
		$name = $producto['nombre'];
		$price = $producto['precio'];
?>	
		<li>
			<a href="#" class="item">
				<!-- <img src="<?php echo $img_url; ?>"/> -->
				<div>
					<p><?php echo $name; ?></p>
					<p>Price:<span><?php echo $price; ?></span></p>
				</div>
			</a>
		</li>


<?php
}
?>
</ul>


<div class="cart">
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
		<h2>Drop here to add to cart</h2>
<input type="button" name='EnviarPedido' class='enviarPedido' value='Comprar'></input>
</div>

