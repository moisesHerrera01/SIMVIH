<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_medicamentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() {

		$this->load->model('Gestionar_antiretrovirales_model');

		$compras_arv = false;
		$compras_arvs = false;
		$arv = false;
		$consumido = false;
		$consumidos = false;
		$arvs = $this->Gestionar_antiretrovirales_model->getAntiretroviral();


		if ($this->input->get('fecha_i') && $this->input->get('fecha_f')) {
			if ($this->input->get('arv')=='default') {
				$json = 'http://localhost/restserver/index.php/compras/compras/format/json';
				$compras_arvs  = json_decode(file_get_contents($json));
				$consumido = array('numero'=>'','cantidad'=>'','comprado'=>'');
				$consumidos = array();
				foreach ($arvs as $arv) {
					$total =0;
					$estados = $arv->getArvEstados();
					foreach ($estados as $st) {
						$total+=$st->getCantidad();
					}
					$consumido['numero'] = $arv->getNumero();
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
			}else{
				$data_reporte = $this->Gestionar_antiretrovirales_model->getReporteMedicamentos($this->input->get('arv'));

				$arv = $data_reporte['arv'];
				$json = 'http://localhost/restserver/index.php/compras/compras/numero/'.$arv->getNumero().'/format/json';
				$compras_arv  = json_decode(file_get_contents($json));
				$arv_estados = $arv->getArvEstados();

				foreach ($arv_estados as $st) {
					$consumido += $st->getCantidad();
				}			
			}
		}		

        $data  = array(
			'arvs' => $arvs,
			'compras_arv'  => $compras_arv,
			'compras_arvs'  => $compras_arvs,
			'arv' => $arv,
			'consumidos' => $consumidos
		);
		
		$this->load->view('reportes/reporte_medicamentos_view', $data);
        
	}
}
