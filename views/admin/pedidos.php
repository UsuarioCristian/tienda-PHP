
<table border=1>
<?php

$conexion = mysqli_connect("localhost","admin","admin","php_tarea");
mysqli_set_charset($conexion, "utf8");
$peticion = "SELECT * FROM pedidos ORDER BY estado ASC";
$resultado = mysqli_query($conexion, $peticion);
while($fila = mysqli_fetch_array($resultado)) {
	$estado = $fila ['estado'];
	// if($estado == 0){$diestado = "no servido";}else{$diestado = "servido";}
	switch ($estado) {
		case 0 :
			$diestado = " no entregado ";
			break;
		case 1 :
			$diestado = " entregado ";
			break;
		case 2 :
			$diestado = " anulado ";
			break;
	}
	
	echo '<tr';
	
	// if($estado == 0){echo ' style="background:rgb(255,200,200);"';}else{echo ' style="background:rgb(200,255,200);"';}
	switch ($estado) {
		case 0 :
			echo ' style="background:rgb(255,200,200);"';
			break;
		case 1 :
			echo ' style="background:rgb(200,255,200);"';
			break;
		case 2 :
			echo ' style="background:rgb(255,255,200);"';
			break;
	}
	
	echo '><td>' . $fila ['nombre'] . "</td><td>" . $fila ['cantidad'] . '</td><td>' . '</td><td>' . $diestado . '</td><td><form action="index.php?rt=admin/entregarPedido" method="POST"><input type="hidden" name="id" value="'.$fila ['id_pedido'].'"><button type= "submit">Pedido entregado</button></td></form><td><form action="index.php?rt=admin/cancelarPedido" method="POST"><input type="hidden" name="id" value="'.$fila ['id_pedido'].'"><button type="submit">Cancelar pedido</button></form></td></tr>';
} 
mysqli_close($conexion);
?>
</table>
