<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionar_antiretroviral extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')){
			redirect('login/index/nosesion');
		}
		$this->load->model('Gestionar_antiretrovirales_model');
	}

	public function index()
	{
		$data = array(
			'antiretrovirales' => $this->Gestionar_antiretrovirales_model->getAntiretroviral(),
		);
		$this->load->view('gestionar_antiretroviral_view', $data);
	}

	public function create(){

        $data['nombre_antiretroviral'] = $this->input->post('nombre');
		$data['abreviatura_antiretroviral'] = $this->input->post('abreviatura');
		$data['descripcion_antiretroviral'] = $this->input->post('descripcion');
        $data['numero'] = $this->input->post('numero');

        $result = $this->Gestionar_antiretrovirales_model->createAntiretroviral($data);

		redirect('Gestionar_antiretroviral/index/success');
	
	}

	public function remove() {
		$this->Gestionar_antiretrovirales_model->removeAntiretroviral($this->input->get('id'));
		redirect('Gestionar_antiretroviral/index/success');
	}
}