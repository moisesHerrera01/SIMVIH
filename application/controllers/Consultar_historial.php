<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultar_historial extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$hist = json_decode(file_get_contents('http://localhost/restserver/index.php/historiales/historiales/numero/666/format/json'));
		$data['expediente'] = $hist;
		
		$this->load->view('consultar_historial_view', $data);
		//Prueba de consumo de ws
		
	}
}