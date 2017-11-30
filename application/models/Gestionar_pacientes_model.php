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
}
