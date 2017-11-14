<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gestionar_usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('gestionar_usuarios_view');
		/*//Prueba de consumo de ws
		$exp = json_decode(file_get_contents('http://localhost/restserver/index.php/expedientes/expedientes/format/json'));
		var_dump($exp);*/
	}

	public function create()
	{
    $this->form_validation->set_rules('ename', 'Nombre de empleado', 'required');
		$this->form_validation->set_rules('uname', 'Nombre de usuario', 'required');
  	$this->form_validation->set_rules('pw', 'Contraseña', 'required');
		$this->form_validation->set_rules('repw', 'Password Confirmation', 'required');
    $this->form_validation->set_rules('activo','required');
    $this->form_validation->set_rules('rol','required');

		if($this->form_validation->run() == TRUE)
		{
      $data['empleado'] = $this->input->post('ename');
			$data['nombre'] = $this->input->post('uname');
			$data['password'] = $this->input->post('pw');
      $data['activo'] = $this->input->post('activo');
      $data['rol'] = $this->input->post('rol');
			$this->load->model('Gestionar_usuarios_model');
			$result = $this->Gestionar_usuarios_model->createUser($data);

			redirect($this->config->base_url()."Gestionar_usuarios");
		}
		else
		{
			$this->load->view('gestionar_usuarios_view');
		}
	}
}
