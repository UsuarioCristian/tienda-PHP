<?php
if (! isset ( $_SESSION )) {
	session_start ();
	$_SESSION ["isAdmin"] = false;
}
?>

<?php 
	if (!$_SESSION["isAdmin"]){
		echo "<a href='index.php?rt=admin/login'>Login admin</a>";
	}else{
		echo "<a href='index.php?rt=admin/login'>Otras funciones (por ahora va al login)</a>";
		echo "<a href='index.php?rt=admin/pedidos'>Pedidos</a>";
	}

?>


