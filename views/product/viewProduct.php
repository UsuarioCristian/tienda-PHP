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
		</div>
		</div>
  </div>
</div>
