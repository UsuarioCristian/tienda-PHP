<?php

Class indexController Extends baseController {

public function index() {
/*** set a template variable ***/
        $this->registry->template->welcome = 'Productos';
	/*** load the index template ***/
		$productos = $this->registry->db->get('productos');
		$this->registry->template->productos = $productos;

    $this->registry->template->show('product/index');
}

public function login(){

$this->registry->template->show('site/login');

}

public function registro(){
	$this->registry->template->show('site/registro');
}

public function logout(){
	if (! isset ( $_SESSION )) {
		session_start ();
	}
	if (isset ( $_SESSION ["isLogin"] ) && $_SESSION["isLogin"]) {
		session_unset();
		session_destroy();
	}
		$this->registry->template->show ( 'user/index' );
}

}

?>
