<?php

Class userController Extends baseController {

	public function index() {
		/*** set a template variable ***/
	        $this->registry->template->welcome = 'User controller index';
		/*** load the index template ***/
	        $this->registry->template->show('user/index');
	}

	public function getUsuarios(){

		$usuarios = $this->registry->db->get('usuario');

		$this->registry->template->usuarios = $usuarios;
		$this->registry->template->show('user/list');

	}

}
