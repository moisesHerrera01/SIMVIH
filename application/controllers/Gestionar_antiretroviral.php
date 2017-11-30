<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionar_antiretroviral extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('gestionar_antiretroviral_view');
	}

	public function create(){
        $this->load->model('Gestionar_antiretrovirales_model');
        
        $data['nombre_antiretroviral'] = $this->input->post('nombre');
		$data['abreviatura_antiretroviral'] = $this->input->post('abreviatura');
		$data['descripcion_antiretroviral'] = $this->input->post('descripcion');
        
        $result = $this->Gestionar_antiretrovirales_model->createAntiretroviral($data);

		redirect('Gestionar_antiretroviral');
	
	}
}