<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/Entity/Paciente.php");
require_once(APPPATH."models/Entity/PacienteEstado.php");
require_once(APPPATH."models/Entity/GradoAutonomia.php");

class Gestionar_estado_pacientes_model extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine->em;
	}

	public function createEstadoPaciente($data){
	    $grado= $this->em->find('Entity\\GradoAutonomia',$data['grado']);
	    $arv= $this->em->find('Entity\\Antiretroviral',$data['esquema']);
	    $paciente = $this->em->find('Entity\\Paciente',$data['id_paciente']);

		$pEstado = new Entity\PacienteEstado();

	    $pEstado->setPeso($data['peso']);
		$pEstado->setIngresos($data['hosp']);
		$pEstado->setPaciente($paciente);
		$pEstado->setServicio($data['servicio']);	
	    $pEstado->setEstado($data['estado']);
	    $pEstado->setArv($arv);
	    $pEstado->setClasificacion($data['clasificacion']);
	    $pEstado->setCriterioArv($data['criterio_arv']);
	    $pEstado->setCriterioCambioArv($data['cambio_arv']);
	    $pEstado->setTipo($data['tipo']);
	    $pEstado->setEgreso($data['egreso']);
	    $pEstado->setMedico($data['med']);
	    $pEstado->setGrado($grado);

		$this->em->persist($pEstado);
		$status = $this->em->flush();
		return true;
	}

	public function getGradoAutonomia(){
		$grados = $this->em->getRepository('Entity\\GradoAutonomia');
		$grds = $grados->findAll();
		return $grds;
	}
}
