<?php 
	class ProductosModel extends Mysql
	{

        private $intcod_producto;
		private $strproducto;
		private $intprecio;
		private $intexistencia;
		private $strcategoria;
		private $intestado;
	

		public function __construct()
		{
			parent::__construct();
		}

        public function selectProductos(){
			$sql = "SELECT  cod_producto,
							producto,
							precio,
							existencia,
							categoria,
							estado
					FROM tbl_producto WHERE estado!=0 ";
					$request = $this->select_all($sql);
			return $request;
		}

        


	
	}
 ?>