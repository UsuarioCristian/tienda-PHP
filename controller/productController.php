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
	
	public function altaProducto(){
		$items = $_POST['items'];
		$item = json_decode($items);
	
		$this->registry->db->insert('productos', array('nombre'=>$item->nombre, 'descripcion'=>$item->descripcion, 'img'=>$item->img,
				'precio'=>$item->precio, 'id_categoria'=>$item->id_categoria));
	
	}
	
	public function borrarProducto(){
		$item = $_POST['items'];
		$item = json_decode($item);
	
		$this->registry->db->delete('productos', array('nombre'=> $item->nombre));
	}

}