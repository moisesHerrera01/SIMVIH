<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function trigger()
	{
		$this->form_validation->set_rules('uname', 'Username', 'required');
		$this->form_validation->set_rules('pw', 'Password', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Login_model');
			$isValidLogin = $this->Login_model->checkLogin();

			if($isValidLogin == true)
			{
				redirect($this->config->base_url());
			}
			else
			{
				redirect($this->config->base_url()."Login");
			}
		}
		else
		{
			$this->load->view('login_view');
		}

	}
}
