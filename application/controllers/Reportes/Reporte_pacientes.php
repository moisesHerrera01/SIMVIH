<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_pacientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')){
			redirect('login/index/nosesion');
		}
	}

	public function index() {

		$this->load->model('Gestionar_pacientes_model');

		$paciente = false;
		$paciente_estado = false;
		$expediente = false;

		if ($this->input->get('paciente')) {
			$info_paciente = $this->Gestionar_pacientes_model->getReportePaciente($this->input->get('paciente'));
			$paciente = $info_paciente[0];
			$paciente_estado = $info_paciente[1];
			$expediente = $exp = json_decode(
					file_get_contents('http://localhost/restserver/index.php/expedientes/expedientes/numero/'.$paciente->getNumero().'/format/json')
				);
		}
		
		$pacientes = $this->Gestionar_pacientes_model->getPacientes();
        $data  = array(
			'pacientes' => $pacientes,
			'paciente'  => $paciente,
			'paciente_estado' => $paciente_estado,
			'expediente' => $expediente
		);
		
		$this->load->view('reportes/reporte_paciente_view', $data);
        
	}
}
