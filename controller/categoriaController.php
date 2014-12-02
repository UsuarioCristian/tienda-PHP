<?php 

Class categoriaController extends baseController{
	
	public function index() {
		
		$this->registry->template->welcome = 'ABM Categorias';
		/*** load the index template ***/
		$categorias = $this->registry->db->get('categorias');
		$this->registry->template->categorias = $categorias;
	
		$this->registry->template->show('categoria/index');
	}
	
	public function getCategorias(){
	
		$categorias = $this->registry->db->get('productos');
	
		$this->registry->template->productos = $categorias;
		$this->registry->template->show('categoria/list');
	
	}
	
	public function  altaCategoria(){
		session_start ();
		if (!isset($_SESSION ["isAdmin"])) {			
			$_SESSION ["isAdmin"] = false;
		}		
		
		if($_SESSION["isAdmin"]){
			$categoria = $_POST['categoria'];
			$categoria = json_encode($categoria);
			$categoria = json_decode($categoria);
			//$item = json_decode($items);
			$this->registry->db->insert('categorias', array('nombre'=>$categoria->nombre, 'descripcion'=>$categoria->descripcion));
			$this->registry->template->show('admin/index');
		}else {
			$this->registry->template->show('admin/index');
		}
		
		
	}
	
	public function borrarCategoria(){
		$item = $_POST['items'];
		$item = json_decode($item);
		
		$this->registry->db->delete('categorias', array('nombre'=> $item->nombre));
	}
	
} 





?>