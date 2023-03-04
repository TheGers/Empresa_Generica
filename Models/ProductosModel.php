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

		////SELECT QUE MANDA A TRAER LOS DATOS A LA BD
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


		//INSERT NO FUNCIONA
		public function insertProducto(string $cod_producto, string $producto, int $precio, int $existencia, string $categoria, int $estado ){
			
			$this->intcod_producto=$cod_producto;
			$this->strproducto=$producto;
			$this->intprecio=$precio;
			$this->intexistencia=$existencia;
			$this->strcategoria=$categoria;
			$this->intestado=$estado;
			$return=0;
			$sql="SELECT * FROM tbl_producto WHERE cod_producto='{$this->intcod_producto}'";
			$request=$this->select_all($sql);
			if(empty($request)){
				$query_insert="INSERT INTO tbl_producto(cod_producto, producto, precio, existencia, categoria, estado)
								VALUES(?, ?, ?, ?, ?, ?)";
				$arrData=array($this->intcod_producto,
								$this->strproducto,
								$this->intprecio,
								$this->intexistencia,
								$this->strcategoria,
								$this->intestado);
				$request_insert= $this->insert($query_insert,$arrData);
				$return=$request_insert;

			}else{
				$return ="exist";
			}
			return $return;








		}


		//PARA LLAMAR UNO 
		public function selectProducto(int $cod_producto){
			$this->intcod_producto = $cod_producto;
			/* echo $cod_producto;
			exit; */
			$sql = "SELECT cod_producto,
							producto,
							precio,
							existencia,
							categoria,
							estado
					FROM tbl_producto WHERE cod_producto = $this->intcod_producto";
			$request = $this->select($sql);
			return $request;

		}
        
	
	}
 ?>