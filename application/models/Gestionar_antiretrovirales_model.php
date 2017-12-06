<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/Entity/Antiretroviral.php");


class Gestionar_antiretrovirales_model extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine->em;
	}

	public function createAntiretroviral($data) {

        $antiretroviral = new Entity\Antiretroviral();

        $antiretroviral->setNombre($data['nombre_antiretroviral']);
        $antiretroviral->setAbreviatura($data['abreviatura_antiretroviral']);
        $antiretroviral->setNumero($data['numero']);
        $antiretroviral->setDescripcion($data['descripcion_antiretroviral']);
            
        $this->em->persist($antiretroviral);
        $status = $this->em->flush();
        return true;
	}

	public function getAntiretroviral() {
		
		$antiretrovirales = $this->em->getRepository('Entity\\Antiretroviral');
		$arvs = $antiretrovirales->findAll();
		return $arvs;

	}

	public function getReporteMedicamento($medicamento, $fecha_inicial, $fecha_final){
		$data = array(
			'arv' => '',
			'datos' =>''
		);
       $arvs = $this->em->createQueryBuilder()
                        ->select('a, b')
                        ->from('Entity\\Antiretroviral', 'a')
                        ->innerJoin('a.arv_estados', 'b')
                        ->innerJoin('Entity\\Paciente', 'c', 'WITH', 'b.paciente = c.id')
                        ->where('a.id = ?1')
                        ->where('b.fecha_arv between ?2 AND ?3')
                        ->setParameter( 1, $medicamento )
                        ->setParameters( array( '2' => $fecha_inicial, '3' => $fecha_final ) )   
                        ->getQuery()
                        ->execute();

		$arv= $this->em->find('Entity\\Antiretroviral',$medicamento);
		$data['arv'] = $arv;
		$data['datos'] = $arvs; 
		return $data;
	}

	public function getReporteMedicamentos($fecha_inicial, $fecha_final){
       $arvs = $this->em->createQueryBuilder()
                        ->select('a, b')
                        ->from('Entity\\Antiretroviral', 'a')
                        ->innerJoin('a.arv_estados', 'b')
                        ->innerJoin('Entity\\Paciente', 'c', 'WITH', 'b.paciente = c.id')
                        ->where('b.fecha_arv between ?2 AND ?3')
                        ->setParameters( array( '2' => $fecha_inicial, '3' => $fecha_final ) )
                        ->getQuery()
                        ->execute();
        return $arvs;
	}
}
