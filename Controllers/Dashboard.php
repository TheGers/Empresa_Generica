<?php 
	//require_once("Models/TCategoria.php");
	//require_once("Models/TProducto.php");
	class Dashboard extends Controllers{
		//use TCategoria, TProducto;
		public function __construct()
		{
			parent::__construct();
			//session_start();
		}

		public function dashboard()
		{
			$pageContent = 2;
			$data['page_tag'] = "Dashboard-Empresa Generica";
			$data['page_title'] = "Dashboard-Empresa Generica";
			$data['page_name'] = "dashboard";

			$this->views->getView($this,"dashboard",$data); 
		}

	}
 ?>