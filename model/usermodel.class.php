<?php

class userModel{
	
	public function getUsuarios(){
		$usuarios = $registry->db->get('usuario');
		return $usuarios;
	}	

}
?>