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

        public function getProductos()
		{
			//if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectProductos();

				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';

					if($arrData[$i]['estado'] == 1)
					{
						$arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
					}
					/* 
						//$arrData[$i]['precio'] = SMONEY.' '.formatMoney($arrData[$i]['precio']);
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['cod_producto'].')" title="Ver producto"><i class="far fa-eye"></i></button>';
						$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['cod_producto'].')" title="Editar producto"><i class="fas fa-pencil-alt"></i></button>';
						$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['cod_producto'].')" title="Eliminar producto"><i class="far fa-trash-alt"></i></button>';
					
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
					*/

					$arrData[$i]['ACCIONES'] = '<div class="text-center">
					<button class="btn btn-secondary btn-sm btnViewProducto" pr="'.$arrData[$i]['cod_producto'].'" title="Ver producto"><i class="far fa-eye"></i></button>
					<button class="btn btn-primary btn-sm btnEditProducto" pr="'.$arrData[$i]['cod_producto'].'" title="Editar producto"><i class="fas fa-pencil-alt"></i></button>
					<button class="btn btn-danger btn-sm btnDelProducto" pr="'.$arrData[$i]['cod_producto'].'" title="Eliminar producto"><i class="far fa-trash-alt"></i></button>
					</div>'; 

				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			//}
			die();
		}



    }

?>


