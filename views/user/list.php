<table>
<?php

foreach ($usuarios as $key => $usuario) {
	# code...
	echo "<tr><td>{$usuario['login']}</td><td>{$usuario['nombre']}</td></tr>";
}

?>
</table>