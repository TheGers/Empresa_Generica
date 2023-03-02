<?php 
	class Productos extends Controllers{
		public function __construct()
		{
			parent::__construct();
		
		}

		public function Productos()
		{

			$data['page_tag'] = "Productos";
			$data['page_title'] = "Productos";
			$data['page_name'] = "productos_";
			$data['page_functions_js'] = "functions_productos.js";
			$this->views->getView($this,"productos",$data); 
		}

        



    }

?>


