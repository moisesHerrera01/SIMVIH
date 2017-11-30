<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultar_historial extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$exp = $this->uri->segment(3);
		$hist = json_decode(file_get_contents('http://localhost/restserver/index.php/historiales/historiales/numero/'.$exp.'/format/json'));
		$data['expediente'] = $hist;
		$data['numero_exp'] = $exp;
		
		$this->load->view('consultar_historial_view', $data);	
	}
}