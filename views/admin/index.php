<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
if (! isset ( $_SESSION ["isAdmin"] )) {
	$_SESSION ["isAdmin"] = false;
}

?>

<?php 
	if (!$_SESSION["isAdmin"]){
?>
		<button type="button" onclick="location.href = 'index.php?rt=admin/login';" class="btn btn-success btn-lg navbar-btn navbar-left">Sign in</button>
<?php	}else{
?>
<aside>
	<div class="border-div">
		<p class="lead">E-Shop PHP</p>
		<ul class="nav nav-pills nav-stacked">
			<li role="presentation"><a icon="glyphicon glyphicon-tasks"
				href="index.php?rt=categoria/index">Nueva Categoria</a></li>
			<li role="presentation"><a href="index.php?rt=product/create">Nuevo
					Producto</a></li>
			<li role="presentation"><a href="index.php?rt=product/view">Vista
					Producto</a></li>
			<li role="presentation"><a href="index.php?rt=admin/pedidos">Pedidos</a></li>
			<li role="presentation"><a href="index.php?rt=oferta/create">Nueva Oferta</a></li>
		</ul>
	</div>

</aside>
<?php }

?>


