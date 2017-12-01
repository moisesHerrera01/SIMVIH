<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/Entity/Paciente.php");
require_once(APPPATH."models/Entity/PacienteEstado.php");

class Gestionar_estado_pacientes extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine->em;
	}

	public function createEstadoPaciente($data)
	{
    $via= $this->em->find('Entity\\ViaTransmision',$data['via_transmision']);
    $clinica= $this->em->find('Entity\\Clinica',$data['clinica']);

	$paciente = new Entity\Paciente();

    $paciente->setNumero($data['numero_expediente']);
	$paciente->setFecha($data['fecha_diagnostico']);
	$paciente->setClinica($clinica);
    $paciente->setVia($via);
		$this->em->persist($paciente);
		$status = $this->em->flush();
		return true;
	}
	public function getPacientes(){
		$pacientes = $this->em->getRepository('Entity\\Paciente');
		$pcts = $pacientes->findAll();
		return $pcts;
	}

	public function addEnfermedad($data){
		    $enf= $this->em->find('Entity\\EnfermedadOportunista',$data['id_enfermedad']);
    		$p= $this->em->find('Entity\\Paciente',$data['id_paciente']);
    		$p->addEnfermedad($enf);
    		$status = $this->em->flush();
	}

	public function getEnfermedades($id_paciente){
		$paciente= $this->em->find('Entity\\Paciente',$id_paciente);
		return $paciente->getEnfermedades();
	}
}
