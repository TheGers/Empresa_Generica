<?php
class DashboardControlador{
    static public function ctrGetDatosDashboard(){
        $datos = DashboardModelo::mdlDatosDashboard();
        return $datos;
    }

    static public function ctrGetVentasMesActual(){
        $ventasMesActual = DashboardModelo::mdlVentasMesActual();
        return $ventasMesActual;
    }
}