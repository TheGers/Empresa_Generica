<?php
class ReporteVentas extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}


    public function ReporteVentas()
	{

		$data['page_tag'] = "ReporteVentas";
		$data['page_title'] = "Reporte de Ventas";
		$data['page_name'] = "ReporteVentas_";
		$data['page_functions_js'] = "functions_reporteventas.js";
		$this->views->getView($this, "reporteventas", $data);
	}

}