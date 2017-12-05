<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_medicamentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {

		$this->load->model('Gestionar_antiretrovirales_model');

		$cantidades = false; //Array que contiene la información a mostrar de los ARV's	
		$cantidad = false; //Array que contiene la información de un solo ARV
		$arvs = $this->Gestionar_antiretrovirales_model->getAntiretroviral();


		if ($this->input->get('fecha_i') && $this->input->get('fecha_f')) {
			if ($this->input->get('arv')=='default') { //Caso para el cual no se especifica ARV
				$json = 'http://localhost/restserver/index.php/compras/compras/format/json';
				$compras_arvs  = json_decode(file_get_contents($json));
				$consumido = array('numero'=>'','nombre'=>'','cantidad'=>'','comprado'=>'', 'abreviatura' => '');
				$consumidos = array();
				foreach ($arvs as $arv) {
					$total =0;
					$estados = $arv->getArvEstados();
					foreach ($estados as $st) {
						$total+=$st->getCantidad();
					}
					$consumido['numero'] = $arv->getNumero();
					$consumido['nombre'] = $arv->getNombre();
					$consumido['abreviatura'] = $arv->getAbreviatura();
					$consumido['cantidad'] = $total;
					$consumidos[] =$consumido;

				}
				$cantidades = array();
				foreach ($consumidos as $s) {
					$cantidad =0;
					foreach ($compras_arvs as $c) {
						if ($s['numero'] == $c->numero_producto) {
							$cantidad+=$c->cantidad;									
					}			
				}
					$reemplazo = array('comprado' => $cantidad);
				    $var = array_replace($s, $reemplazo);
				    if (!(in_array($var, $cantidades))) {   
				    $cantidades[] = $var; 				
					}
			}
			}else{ //Caso para el cual se especifica un ARV
				$cant = 0; //Cantidad de ARV comprado
				$consumido_arv = 0; //Cantidad de ARV consumido
				$cantidad = array();

				$data_reporte = $this->Gestionar_antiretrovirales_model->getReporteMedicamentos($this->input->get('arv'));
				$arv = $data_reporte['arv'];
				$json = 'http://localhost/restserver/index.php/compras/compras/format/json';
				$compras_arv  = json_decode(file_get_contents($json));
				$arv_estados = $arv->getArvEstados();

				foreach ($arv_estados as $st) {
					$consumido_arv += $st->getCantidad();					
				}
				foreach ($compras_arv as $c) {
					if ($c->numero_producto == $arv->getNumero()) {
						$cant += $c->cantidad;
					}					
				}
				$cantidad['numero'] = $arv->getNumero();
				$cantidad['nombre'] = $arv->getNombre();
				$cantidad['abreviatura'] = $arv->getAbreviatura();
				$cantidad['cantidad'] = $consumido_arv;
				$cantidad['comprado'] =	$cant;			
			}
		}		

        $data  = array(
			'arvs' => $arvs,	
			'cantidad' => $cantidad,
			'cantidades' => $cantidades
		);
		
		$this->load->view('reportes/reporte_medicamentos_view', $data);
        
	}
}
