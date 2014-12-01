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
	public function create() {
			$categorias = $this->registry->db->get('categorias');
			$this->registry->template->categorias = $categorias;

			$this->registry->template->show('product/create');
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
		$item = json_encode($items);
		$item = json_decode($item);
	var_dump($item);
		$this->registry->db->insert('productos', array('nombre'=>$item->nombre, 'descripcion'=>$item->descripcion, 'id_categoria'=>$item->id_categoria,
				'precio'=>$item->precio));
	
	}
	
	public function borrarProducto(){
		$item = $_POST['items'];
		$item = json_decode($item);
	
		$this->registry->db->delete('productos', array('nombre'=> $item->nombre));
	}

}