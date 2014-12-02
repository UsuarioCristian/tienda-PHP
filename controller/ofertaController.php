<?php 

Class ofertaController extends baseController{
	
	public function index() {
	
		$this->registry->template->welcome = 'ABM Ofertas';
		/*** load the index template ***/
		$ofertas = $this->registry->db->get('ofertas');
		$this->registry->template->ofertas = $ofertas;
	
		$this->registry->template->show('oferta/index');
	}
	
	public function create() {
		$productos = $this->registry->db->get('productos');
		$this->registry->template->productos = $productos;
	
		$this->registry->template->show('oferta/create');
	}
	
	public function altaOferta(){
		session_start ();
		if (! isset ( $_SESSION ["isAdmin"] )) {
			$_SESSION ["isAdmin"] = false;
		}
		
		if ($_SESSION ["isAdmin"]) {
			$items = $_POST ['items'];
			$item = json_encode ( $items );
			$item = json_decode ( $item );
			$this->registry->db->insert ( 'ofertas', array (
					'descripcion' => $item->descripcion,
					'descuento' => $item->descuento,
					'id_producto' => $item->id_producto 
			) );
			// 'fecha_limite' => $item->fecha_limite
			$this->registry->template->show ( 'admin/index' );
		} else {
			$this->registry->template->show ( 'admin/index' );
		}
	}
	
	
	
}


?>