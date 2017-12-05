<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionar_estado_pacientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')){
			redirect('login/index/nosesion');
		}
		$this->load->model(array('Gestionar_antiretrovirales_model', 'Gestionar_pacientes_model', 'Gestionar_estado_pacientes_model'));
	}

	public function index()
	{
		$id_paciente = $this->uri->segment(3);
		$arvs = $this->Gestionar_antiretrovirales_model->getAntiretroviral();
		$grds = $this->Gestionar_estado_pacientes_model->getGradoAutonomia();
		$data  = array('arvs' => $arvs, 'grds' => $grds, 'id_paciente' => $id_paciente);
		$this->load->view('gestionar_estado_pacientes_view', $data);
	}

	public function create(){
		$data['peso'] = $this->input->post('peso');
		$data['hosp'] = $this->input->post('hosp');
		$data['servicio'] = $this->input->post('servicio');
		$data['tipo'] = $this->input->post('tipo');
		$data['clasificacion'] = $this->input->post('clasificacion');
		$data['estado'] = $this->input->post('estado');
		$data['criterio_arv'] = $this->input->post('cri');
		$data['esquema'] = $this->input->post('esquema');
		$data['cambio_arv'] = $this->input->post('camb');
		$data['egreso'] = $this->input->post('egreso');
		$data['med'] = $this->input->post('med');
		$data['grado'] = $this->input->post('grado');
		$data['id_paciente'] = $this->input->post('id_paciente');
		$data['fecha'] = $this->input->post('fecha');
		$data['cantidad'] = $this->input->post('cantidad');

		$result = $this->Gestionar_estado_pacientes_model->createEstadoPaciente($data);

		redirect($this->config->base_url()."Gestionar_estado_pacientes/index/".$data['id_paciente']);
	
	}
}