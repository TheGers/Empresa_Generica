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
			$sql = "SELECT  p.cod_producto,
							p.producto,
							p.precio,
							p.existencia,
							p.categoria,
							p.estado
					FROM tbl_producto p WHERE p.cod_producto ";
					$request = $this->select_all($sql);
			return $request;
		}


	
	}
 ?>