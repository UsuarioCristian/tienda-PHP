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
	public function view() {

			$this->registry->template->show('product/viewProduct');
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
		

		var_dump($_FILES['fileToUpload']);
		$target_dir = "application/public/images/products/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo '<div class="alert alert-danger" role="alert">'."File is an image - " . $check["mime"] . ".".'</div>';
		        $uploadOk = 1;
		    } else {
		        echo '<div class="alert alert-danger" role="alert">'."File is not an image.".'</div>';
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo '<div class="alert alert-danger" role="alert">'."Sorry, file already exists.".'</div>';
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    echo '<div class="alert alert-danger" role="alert">'."Sorry, your file is too large.".'</div>';
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo '<div class="alert alert-danger" role="alert">'."Sorry, only JPG, JPEG, PNG & GIF files are allowed.".'</div>';
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo '<div class="alert alert-danger" role="alert">'."Sorry, your file was not uploaded.".'</div>';
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		    	$this->registry->db->insert('productos', array('nombre'=>$item->nombre, 'img'=>$_FILES["fileToUpload"]["name"], 'descripcion'=>$item->descripcion, 'id_categoria'=>$item->id_categoria,
				 'precio'=>$item->precio));
		        echo '<div class="alert alert-success" role="alert">'."The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.".'</div>';
		    } else {
		        echo '<div class="alert alert-danger" role="alert">'."Sorry, there was an error uploading your file.".'</div>';
		    }
		}



	}
		
		public function borrarProducto(){
			$item = $_POST['items'];
			$item = json_decode($item);
		
			$this->registry->db->delete('productos', array('nombre'=> $item->nombre));
		}

}