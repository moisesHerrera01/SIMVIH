<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionar_cumplimiento extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('logged_in')){
			redirect('login/index/nosesion');
		}
        $this->load->model('Gestionar_cumplimiento_model');
	}

	public function index() {

        $this->load->model('Gestionar_pacientes_model');
        $pacientes = $this->Gestionar_pacientes_model->getPacientes();
        $data  = array(
            'cumplimientos' => $this->Gestionar_cumplimiento_model->getCumplimientos(),
            'pacientes' => $pacientes
        );
        
		$this->load->view('gestionar_cumplimiento_view', $data);
	}

	public function create() {
        
        $data['paciente_cumplimiento'] = $this->input->post('paciente');
        $data['asesoria_pre_prueba_cumplimiento'] = $this->input->post('asesoria_pre_prueba');
        $data['asesoria_post_prueba_cumplimiento'] = $this->input->post('asesoria_post_prueba');
        $data['asesoria_pre_embarazo_cumplimiento'] = $this->input->post('asesoria_pre_embarazo');
        $data['asesoria_post_embarazo_cumplimiento'] = $this->input->post('asesoria_post_embarazo');
        $data['anticonceptivos_cumplimiento'] = $this->input->post('anticonceptivos');
        $data['charla_contagio_cumplimiento'] = $this->input->post('charla_contagio');
        $data['charla_prevencion_cumplimiento'] = $this->input->post('charla_prevencion');
        $data['grupo_lucha_vih_cumplimiento'] = $this->input->post('grupo_lucha_vih');
        $data['charla_autocuidado_cumplimiento'] = $this->input->post('charla_autocuidado');
        $data['charla_alimentacion_cumplimiento'] = $this->input->post('charla_alimentacion');
        $data['fecha_prueba_cumplimiento'] = $this->input->post('fecha_prueba');
        $data['fecha_inicio_charlas_cumplimiento'] = $this->input->post('fecha_inicio_charlas');
        $data['charla_sexualidad_cumplimiento'] = $this->input->post('charla_sexualidad');
        $data['evaluacion_psicologica_cumplimiento'] = $this->input->post('evaluacion_psicologica');
        $data['evaluacion_nutricionista_cumplimiento'] = $this->input->post('evaluacion_nutricionista');
        $data['lactancia_materna_cumplimiento'] = $this->input->post('lactancia_materna');
        
        $result = $this->Gestionar_cumplimiento_model->createCumplimiento($data);

		redirect('Gestionar_cumplimiento/index/success/');
	
    }

    public function remove() {
        $this->Gestionar_cumplimiento_model->removeCumplimiento($this->input->get('id'));
		redirect($this->config->base_url()."gestionar_cumplimiento/index/success/");
    }

}