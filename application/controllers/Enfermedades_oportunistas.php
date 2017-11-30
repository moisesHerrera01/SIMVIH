<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enfermedades_oportunistas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gestionar_pacientes_model');
	}

	public function index()
	{
		$id_paciente = $this->uri->segment(3);
		$enf = $this->Gestionar_pacientes_model->getEnfermedades($id_paciente);
		$data  = array('enfermedades' => $enf,'id_paciente' => $id_paciente);
		$this->load->view('enfermedades_oportunistas_view', $data);
	}

	public function addEnfermedad(){
		$data['id_paciente'] = $this->input->post('id_paciente');
		$data['id_enfermedad'] = $this->input->post('id_enfermedad');
		$this->Gestionar_pacientes_model->addEnfermedad($data); 
		redirect($this->config->base_url()."Enfermedades_oportunistas/index/".$data['id_paciente']);
	}
}