<?php
class Productos extends Controllers
{
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
		$this->views->getView($this, "productos", $data);
	}

	public function getProductos(){
		
		$arrData = $this->model->selectProductos();

		for ($i = 0; $i < count($arrData); $i++) {
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';

			if ($arrData[$i]['estado'] == 1) {
				$arrData[$i]['estado'] = '<span class="badge badge-success">Disponible</span>';
			} else {
				$arrData[$i]['estado'] = '<span class="badge badge-danger">Agotado</span>';
			}
			
		 $arrData[$i]['precio'] = SMONEY.' '.formatMoney($arrData[$i]['precio']);
			$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['cod_producto'].')" title="Ver producto"><i class="far fa-eye"></i></button>';
			$btnEdit = '<button class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['cod_producto'].')" title="Editar producto"><i class="fas fa-pencil-alt"></i></button>';
			$btnDelete = '<button class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['cod_producto'].')" title="Eliminar producto"><i class="far fa-trash-alt"></i></button>';
					
			$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
 

		
					
		}
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
	
		die();
	}

//AGREGAR NUEVO
	public function setProducto(){
		
		if($_POST){
			/* dep($_POST);
			die(); */
			if(empty($_POST['txtNombre'])||  empty($_POST['txtPrecio'])|| empty($_POST['txtexistencia']) 
				||empty($_POST['txtcategoria']) || empty($_POST['listStatus']) )
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{
				
				$intcod_producto = intval($_POST['idProducto']);
				$strproducto = strClean($_POST['txtproducto']);
				$intprecio = intval($_POST['txtPrecio']);
				$intexistencia = intval($_POST['txtexistencia']);
				$strcategoria = strClean($_POST['txtcategoria']);
				$intestado = intval($_POST['listStatus']);
				//$request_producto = "";
				if($intcod_producto == 0)
					{
						$option = 1;
						$request_producto = $this->model->insertProducto($intcod_producto,
																		$strproducto,  
																		$intprecio, 
																		$intexistencia,
																		$strcategoria,
																		$intestado);
						
					}else{
						$option = 2;



					}

					if($request_producto>0){

						if($option==1){
							$arrResponse = array('status' => true, 'cod_producto' => $request_producto, 'msg' => 'Datos guardados correctamente.');
						}else{
							//$arrResponse = array('status' => true, 'cod_producto' => $intcod_producto, 'msg' => 'Datos Actualizados correctamente.');
						}

					}else if($request_producto == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atención! ya existe un producto con el Código Ingresado.');		
					}else{
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}	
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();



	}


	//LLAMAR SOLO UNO
	public function getProducto( $cod_producto){
		
			$cod_producto = intval($cod_producto);
			if($cod_producto > 0){
				$arrData = $this->model->selectProducto($cod_producto);
				 /* dep($arrData);
				 die();  */
				if(empty($arrData)){
					$arrResponse = array('estado' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('estado' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
		
		die();
	}
	



}
?>
