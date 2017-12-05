<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte_normas extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if (!$this->session->userdata('logged_in')){
			redirect('login/index/nosesion');
        }
        
        if ( $this->session->userdata('rol') == 'Promotor' ) {
			redirect('dashboard/index/norol');
		}
	}

	public function index() {

		$this->load->model('Gestionar_cumplimiento_model');

		$resumen = array(
            'asesoria_pre_prueba' => array( 'si' => 0, 'no' => 0 ),
            'asesoria_post_prueba' => array( 'si' => 0, 'no' => 0 ),
            'asesoria_pre_embarazo' => array( 'si' => 0, 'no' => 0, 'no_aplica' => 0 ),
            'asesoria_post_embarazo' => array( 'si' => 0, 'no' => 0, 'no_aplica' => 0 ),
            'anticonceptivos' => array( 'si' => 0, 'no' => 0 ),
            'charla_contagio' => array( 'si' => 0, 'no' => 0 ),
            'charla_prevencion' => array( 'si' => 0, 'no' => 0 ),
            'grupo_lucha_vih' => array( 'si' => 0, 'no' => 0 ),
            'charla_autocuidado' => array( 'si' => 0, 'no' => 0 ),
            'charla_alimentacion' => array( 'si' => 0, 'no' => 0 ),
            'charla_sexualidad' => array( 'si' => 0, 'no' => 0 ),
            'evaluacion_psicologica' => array( 'si' => 0, 'no' => 0 ),
            'evaluacion_nutricionista' => array( 'si' => 0, 'no' => 0 ),
            'lactancia_materna' => array( 'si' => 0, 'no' => 0, 'no_aplica' => 0 ),
        );

        $get = false;
        $graf = false;
        
        $clinicas = $this->Gestionar_cumplimiento_model->getClinicas();

        if ( $this->input->get('clinica') && $this->input->get('fecha_inicial') && $this->input->get('fecha_final') ) {
            $normas = $this->Gestionar_cumplimiento_model->getReporteNorma(
                $this->input->get('clinica'),
                $this->input->get('fecha_inicial'),
                $this->input->get('fecha_final')
            );
            $get = true;

            if ($this->input->get('grafico')) {
                $graf = true;
            }

            foreach ($normas as $norma) {
                
                if ($norma->getAsesoriaPrePrueba()) {
                    $resumen['asesoria_pre_prueba']['si']++;
                } else {
                    $resumen['asesoria_pre_prueba']['no']++;
                }
    
                if ($norma->getAsesoriaPostPrueba()) {
                    $resumen['asesoria_post_prueba']['si']++;
                } else {
                    $resumen['asesoria_post_prueba']['no']++;
                }
                
                if ($norma->getAsesoriaPreEmbarazo() == 'Si') {
                    $resumen['asesoria_pre_embarazo']['si']++;
                } elseif ($norma->getAsesoriaPreEmbarazo() == 'No') {
                    $resumen['asesoria_pre_embarazo']['no']++;
                } else {
                    $resumen['asesoria_pre_embarazo']['no_aplica']++;
                }
    
                if ($norma->getAsesoriaPostEmbarazo() == 'Si') {
                    $resumen['asesoria_post_embarazo']['si']++;
                } elseif ($norma->getAsesoriaPostEmbarazo() == 'No') {
                    $resumen['asesoria_post_embarazo']['no']++;
                } else {
                    $resumen['asesoria_post_embarazo']['no_aplica']++;
                }
    
                if ($norma->getAnticonceptivos()) {
                    $resumen['anticonceptivos']['si']++;
                } else {
                    $resumen['anticonceptivos']['no']++;
                }
    
                if ($norma->getCharlaContagio()) {
                    $resumen['charla_contagio']['si']++;
                } else {
                    $resumen['charla_contagio']['no']++;
                }
                
                if ($norma->getCharlaPrevencion()) {
                    $resumen['charla_prevencion']['si']++;
                } else {
                    $resumen['charla_prevencion']['no']++;
                }
                
                if ($norma->getGrupoLuchaVih()) {
                    $resumen['grupo_lucha_vih']['si']++;
                } else {
                    $resumen['grupo_lucha_vih']['no']++;
                }
    
                if ($norma->getCharlaAutocuidado()) {
                    $resumen['charla_autocuidado']['si']++;
                } else {
                    $resumen['charla_autocuidado']['no']++;
                }
    
                if ($norma->getCharlaAlimentacion()) {
                    $resumen['charla_alimentacion']['si']++;
                } else {
                    $resumen['charla_alimentacion']['no']++;
                }
    
                if ($norma->getCharlaSexualidad()) {
                    $resumen['charla_sexualidad']['si']++;
                } else {
                    $resumen['charla_sexualidad']['no']++;
                }
                
                if ($norma->getEvaluacionPsicologica()) {
                    $resumen['evaluacion_psicologica']['si']++;
                } else {
                    $resumen['evaluacion_psicologica']['no']++;
                }
                
                if ($norma->getEvaluacionNutricionista()) {
                    $resumen['evaluacion_nutricionista']['si']++;
                } else {
                    $resumen['evaluacion_nutricionista']['no']++;
                }
    
                if ($norma->getLactanciaMaterna() == 'Si') {
                    $resumen['lactancia_materna']['si']++;
                } elseif ($norma->getLactanciaMaterna() == 'No') {
                    $resumen['lactancia_materna']['no']++;
                } else {
                    $resumen['lactancia_materna']['no_aplica']++;
                }
    
            }
        }
		
        $data  = array(
            'resumen' => $resumen,
            'clinicas'=> $clinicas,
            'get'     => $get,
            'grafico' => $graf
		);
		
		$this->load->view('reportes/reporte_normas_view', $data);
        
    }
    
}
