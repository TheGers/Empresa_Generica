<?php 
	class Roles extends Controllers{
		//use TCategoria, TProducto;
		public function __construct()
		{
			parent::__construct();
			//session_start();
		}

		public function roles()
		{
			$pageContent = 3;
			$data['page_tag'] = "Roles Usuario";
			$data['page_title'] = "Roles Usuario-Empresa Generica";
			$data['page_name'] = "rol_usuario";
			$this->views->getView($this,"roles",$data); 
		}

		public function getRoles()
		{
			$arrData = $this->model->selectRoles();

			for($i=0; $i < count($arrData);$i++){
				if($arrData[$i]['STATUS'] == 1)
				{
					$arrData[$i]['STATUS'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['STATUS'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['ACCIONES'] = '<div class="text-center">
				<button class="btn btn-secondary btn-sm btnPermisosRol" rl="'.$arrData[$i]['COD_ROLES'].'" title="Permisos"><i class="fas fa-key"></i></button>
 				<button class="btn btn-primary btn-sm btnEditRol" rl="'.$arrData[$i]['COD_ROLES'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
				<button class="btn btn-danger btn-sm btnDelRol" rl="'.$arrData[$i]['COD_ROLES'].'" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				</div>';
			}

			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function setRol(){
			$strRol =  strClean($_POST['txtNombre']);
			$strDescipcion = strClean($_POST['txtDescripcion']);
			$intStatus = intval($_POST['listStatus']);
			$request_rol = $this->model->insertRol($strRol, $strDescipcion, $intStatus);

			if($request_rol > 0 )
			{
				$arrResponse = array('STATUS' => true, 'msg' => 'Datos guardados correctamente.');

			}else if($request_rol == 'exist'){
				$arrResponse = array('STATUS' => false, 'msg' => '¡Atención! El Rol ya existe.');
			}else{
				$arrResponse = array("STATUS" => false, "msg" => 'No es posible almacenar los datos.');
			}

			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
	}


	}
 ?>