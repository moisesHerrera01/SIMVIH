<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionar_pacientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Gestionar_pacientes_model');
		$pacientes = $this->Gestionar_pacientes_model->getPacientes();
		$data  = array('pacientes' => $pacientes);
		$this->load->view('gestionar_pacientes_view', $data);
	}

	public function create(){
		$data['numero_expediente'] = $this->input->post('numero_expediente');
		$data['fecha_diagnostico'] = $this->input->post('fecha_diagnostico');
		$data['clinica'] = $this->input->post('clinica');
		$data['via_transmision'] = $this->input->post('via_transmision');
		$result = $this->Gestionar_pacientes_model->createPaciente($data);

		redirect($this->config->base_url()."Gestionar_pacientes");
	
	}
}