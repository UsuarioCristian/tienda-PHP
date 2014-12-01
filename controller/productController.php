<?php

Class productController Extends baseController {

	public function index() {
		/*** set a template variable ***/
	        $this->registry->template->welcome = 'Carro de compras';
		/*** load the index template ***/
			$productos = $this->registry->db->get('productos');
			$this->registry->template->productos = $productos;

	        $this->registry->template->show('product/index');
	}

	public function getProductos(){

		$productos = $this->registry->db->get('productos');

		$this->registry->template->productos = $productos;
		$this->registry->template->show('product/list');

	}

	public function guardarPedido(){
		$items = $_POST['items'];
		$items = json_decode($items);

		foreach ($items as $key => $item) {
			# code...
			$this->registry->db->insert('pedidos', array('nombre'=>$item->name,
													      'cantidad'=>$item->quantity,
													      'precio'=>$item->price));
		}
	}

}