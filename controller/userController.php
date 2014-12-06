<?php

Class userController Extends baseController {
	
	public function index() {
		$this->registry->template->welcome = 'Productos';
		$productos = $this->registry->db->get ( 'productos' );
		$this->registry->template->productos = $productos;
		
		$this->registry->template->show ( 'product/index' );
	}

	public function getUsuarios(){

		$usuarios = $this->registry->db->get('usuario');

		$this->registry->template->usuarios = $usuarios;
		$this->registry->template->show('user/list');

	}
	
	public function registroUser(){
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$name = $_POST ['name'];
		$adress = $_POST ['adress'];
		$usuarios = $this->registry->db->get('usuarios');
		
		$encontre = false;
		foreach ($usuarios as $user){
			if ($user['nickname'] == $username) {
				$encontre = true;			
			}
		}
		if($encontre){
			echo "El usuario ".$username." ya existe";
			session_unset();
			session_destroy();			
		}else {
			if (! isset ( $_SESSION )) {
				session_start ();
			}
			$_SESSION ["nickname"] = $username;
			$_SESSION ["isAdmin"] = false;
			$_SESSION ["isLogin"] = true;
			$this->registry->db->insert('usuarios', array('nickname'=>$username, 'password'=>$password,'name'=>$name, 'adress'=>$adress));
			
			$this->registry->template->show ( 'user/index' );
		}	
			
			
	}
	
	public function loginUser(){
		$username = $_POST ['username'];
		$password = $_POST ['password'];
		$usuarios = $this->registry->db->get('usuarios');
	
		$encontre = false;
		foreach ($usuarios as $user){
			if ($user['nickname'] == $username) {
				$encontre = true;
			}
		}
		if($encontre){
			if (! isset ( $_SESSION )) {
				session_start ();
			}
			$_SESSION ["nickname"] = $username;
			$_SESSION ["isAdmin"] = false;
			$_SESSION ["isLogin"] = true;
			$this->registry->template->show ( 'user/index' );
			
		}else {
			
			echo "El usuario ".$username." no existe";
			session_unset();
			session_destroy();
				
			$this->registry->template->show ( 'user/index' );
		}
			
			
	}

}
