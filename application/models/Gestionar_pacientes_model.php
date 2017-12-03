<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/Entity/Paciente.php");


class Gestionar_pacientes_model extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine->em;
	}

	public function createPaciente($data)
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

	public function getEnfermedadesAll(){
		$enfermedades = $this->em->getRepository('Entity\\EnfermedadOportunista');
		$enfs = $enfermedades->findAll();
		return $enfs;
	}

	public function getEnfermedades($id_paciente){
		$paciente= $this->em->find('Entity\\Paciente',$id_paciente);
		return $paciente->getEnfermedades();
	}

	public function getClinicas(){
		$clinicas = $this->em->getRepository('Entity\\Clinica');
		$clics = $clinicas->findAll();
		return $clics;
	}
	public function getViasTransmision(){
		$vias = $this->em->getRepository('Entity\\ViaTransmision');
		$vs = $vias->findAll();
		return $vs;
	}

	public function getReportePaciente($id) {

		$paciente = $this->em->createQueryBuilder()
						->select('a, b, c, d')
						->from('Entity\\Paciente', 'a')
						->innerJoin('a.clinica', 'b')
						->innerJoin('a.via', 'c')
						->innerJoin('Entity\\PacienteEstado', 'd', 'WITH', 'a.id = d.paciente')
						->where('a.id = ?1')
						->setParameter(1, $id)
						->getQuery()
						->execute();
		
		return $paciente;
	}
}
