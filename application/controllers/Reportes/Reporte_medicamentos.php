<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_medicamentos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')){
			redirect('login/index/nosesion');
        }
        
        if ( $this->session->userdata('rol') == 'Promotor' ) {
			redirect('dashboard/index/norol');
		}
	}

	public function index() {

		$this->load->model(array('Gestionar_antiretrovirales_model', 'Gestionar_pacientes_model'));

		$cantidades = false; //Array que contiene la información a mostrar de los ARV's	
		$cantidad = false; //Array que contiene la información de un solo ARV
		$arvs = $this->Gestionar_antiretrovirales_model->getAntiretroviral();
		$cls = $this->Gestionar_pacientes_model->getClinicas();


		if ($this->input->get('fecha_i') && $this->input->get('fecha_f') && $this->input->get('clinica')!='default') {
			$numero_establecimiento; //numero de establecimiento de la clinica
			$fecha_i = $this->input->get('fecha_i');
			$fecha_f = $this->input->get('fecha_f');
			$id_clinica = $this->input->get('clinica');
			if ($this->input->get('arv')=='default') { //Caso para el cual no se especifica ARV
				$data_reporte = $this->Gestionar_antiretrovirales_model->getReporteMedicamentos($fecha_i, $fecha_f);
				$json = 'http://localhost/restserver/index.php/compras/compras/format/json';
				$compras_arvs  = json_decode(file_get_contents($json));
				$consumido = array('numero'=>'','nombre'=>'','cantidad'=>'','comprado'=>'', 'abreviatura' => '');
				$consumidos = array();
				foreach ($data_reporte as $arv) {
					$total =0;
					$estados = $arv->getArvEstados();
					foreach ($estados as $st) {
						$p = $st->getPaciente();
						$c = $p->getClinica();
						if ($c->getId() == $id_clinica) {
							$numero_establecimiento = $c->getNumero();
							$total+=$st->getCantidad();
						}						
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
							if ($c->fecha>=$fecha_i && $c->fecha<=$fecha_f) {
								if ($c->numero_establecimiento == $numero_establecimiento) {
									$cantidad+=$c->cantidad;
								}		
							}															
					}			
				}
					$reemplazo = array('comprado' => $cantidad);
				    $var = array_replace($s, $reemplazo);
				    if (!(in_array($var, $cantidades))) {   
				    $cantidades[] = $var; 				
					}
			}
			}else{ //Caso para el cual se especifica un ARV
				$id_arv = $this->input->get('arv');
				$cant = 0; //Cantidad de ARV comprado
				$consumido_arv = 0; //Cantidad de ARV consumido
				$cantidad = array(); //Array que contiene la data a enviar a la vista

				$data_reporte = $this->Gestionar_antiretrovirales_model->getReporteMedicamento($id_arv, $fecha_i, $fecha_f);
				$arv;
				$validador=0;
				$json = 'http://localhost/restserver/index.php/compras/compras/format/json';
				$compras_arv  = json_decode(file_get_contents($json));				
					foreach ($data_reporte['datos'] as $ar) {
					if ($ar->getId() == $id_arv) {
						$arv = $ar;
						$validador++;
					}					
				}
				if ($validador>0) {
				$arv_estados = $arv->getArvEstados();

				foreach ($arv_estados as $st) {
					$p = $st->getPaciente();
					$c = $p->getClinica();
					if ($c->getId() == $id_clinica) {
						$numero_establecimiento = $c->getNumero();
						$consumido_arv += $st->getCantidad();
					}										
				}
				foreach ($compras_arv as $c) {
					if ($c->numero_producto == $arv->getNumero()) {
						if ($c->fecha>=$fecha_i && $c->fecha<=$fecha_f) {
							if ($c->numero_establecimiento == $numero_establecimiento) {
									$cant+=$c->cantidad;
								}		
						}
					}					
				}
				$cantidad['numero'] = $arv->getNumero();
				$cantidad['nombre'] = $arv->getNombre();
				$cantidad['abreviatura'] = $arv->getAbreviatura();
				$cantidad['cantidad'] = $consumido_arv;
				$cantidad['comprado'] =	$cant;	
				}else{
					redirect($this->config->base_url()."Reportes/Reporte_medicamentos");
				}
										
			}
		}		

        $data  = array(
			'arvs' => $arvs,	
			'cls' => $cls,
			'cantidad' => $cantidad,
			'cantidades' => $cantidades
		);
		
		$this->load->view('reportes/reporte_medicamentos_view', $data);
        
	}
}
