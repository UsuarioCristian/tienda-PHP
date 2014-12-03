<?php
	$img_url = 'application/public/images/products/'.$producto['img'];
	$name = $producto['nombre'];
	$id = $producto['id_producto'];
	$price = $producto['precio'];
	$description = $producto['descripcion'];
?>
<div class="panel panel-default panel-producto">
  <div class="panel-body">
		<div class="thumbnail">
			<img src="<?php echo $img_url; ?>" alt="<?php echo $name; ?>" class="img-thumbnail">
		<div class="caption-full">
		<h4 class="pull-right">$<?php echo $price; ?></h4>
		<h4><a href="#"><?php echo $name; ?></a>
		</h4>
		<p><?php echo $description; ?></p>
		<form class="pull-right" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="federicofernandez24@gmail.com">
			<input type="hidden" name="lc" value="US">
			<input type="hidden" name="item_name" value="<?php echo $name; ?>">
			<input type="hidden" name="item_number" value="<?php echo $id; ?>">
			<input type="hidden" name="amount" value="<?php echo $price; ?>">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="button_subtype" value="services">
			<input type="hidden" name="no_note" value="0">
			<input type="hidden" name="tax_rate" value="0.000">
			<input type="hidden" name="shipping" value="0.00">
			<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		</div>

		</div>
  </div>
</div>
