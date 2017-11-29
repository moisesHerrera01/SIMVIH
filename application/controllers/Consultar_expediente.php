<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultar_expediente extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$exp = json_decode(file_get_contents('http://localhost/restserver/index.php/expedientes/expedientes/numero/666/format/json'));
		$data['expediente'] = $exp;
		
		$this->load->view('consultar_expediente_view', $data);
		//Prueba de consumo de ws
		
		//var_dump($exp);
	}
}
