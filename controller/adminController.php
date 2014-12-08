<?php 

Class adminController extends baseController{
	public function index() {
	
		$this->registry->template->welcome = 'ADMIN';
		/*** load the index template ***/
		//$categorias = $this->registry->db->get('categorias');
		//$this->registry->template->productos = $categorias;
	
		$this->registry->template->show('admin/index');
	}
	
	public function login(){
	
		$this->registry->template->show('admin/login');
	
	}
	public function loginAdmin() {
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$this->debug_to_console ( $username );
		$users = $this->registry->db->get ( 'administradores' );
		
		$encontre = false;
		foreach ($users as $user){
			if ($user['nickname'] == $username) {				
				if ($user['password'] == $password) {
					$this->debug_to_console ( "Login correcto");
					$encontre = true;
					if (! isset ( $_SESSION )) {
						session_start ();
					}
					$_SESSION ["nickname"] = $username;
					$_SESSION ["isAdmin"] = true;
					$_SESSION ["isLogin"] = true;
					var_dump($_SESSION);
					$this->registry->template->show ( 'admin/index' );
				} else {
					$this->debug_to_console ( "PASS INCORRECTA" );
					$this->registry->template->show ( 'admin/index' );
				}
			}
		}
		if(!$encontre){
			echo "El usuario ".$username." no existe";
		}
		
	}
	
	function debug_to_console( $data ) {
	
		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
	
		echo $output;
	}
	
	public function pedidos(){
		$this->registry->template->show ( 'admin/pedidos' );
	}
	public function cancelarPedido() {
		$conexion = mysqli_connect ( "localhost", "admin", "admin", "php_tarea" );
		mysqli_set_charset ( $conexion, "utf8" );
		$peticion = "UPDATE pedidos SET estado=2 WHERE id_pedido = '".$_POST['id']."'";
		if($resultado = mysqli_query ( $conexion, $peticion )){
			$this->debug_to_console("Entrooo");
		}else{
			$this->debug_to_console("No anda");
		}
		
		mysqli_close ( $conexion );
		
		$this->registry->template->show ( 'admin/pedidos' );
	}
	
	public function entregarPedido(){
		$conexion = mysqli_connect ( "localhost", "admin", "admin", "php_tarea" );
		mysqli_set_charset ( $conexion, "utf8" );
		$peticion = "UPDATE pedidos SET estado=1 WHERE id_pedido = '".$_POST['id']."'";
		if($resultado = mysqli_query ( $conexion, $peticion )){
			$this->debug_to_console("Entrooo");
		}else{
			$this->debug_to_console("No anda");
		}
		
		mysqli_close ( $conexion );

		$this->registry->template->show ( 'admin/pedidos' );
		
	}
}

?>