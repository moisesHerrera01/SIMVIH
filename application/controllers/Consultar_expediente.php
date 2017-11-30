<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultar_expediente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$numero_exp = $this->uri->segment(3);
		$exp = json_decode(file_get_contents('http://localhost/restserver/index.php/expedientes/expedientes/numero/'.$numero_exp.'/format/json'));
		$data['expediente'] = $exp;
		
		$this->load->view('consultar_expediente_view', $data);
	}
}
