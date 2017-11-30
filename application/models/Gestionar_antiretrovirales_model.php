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

	public function createAntiretroviral($data)
	{
        $antiretroviral = new Entity\Antiretroviral();

        $antiretroviral->setNombre($data['nombre_antiretroviral']);
        $antiretroviral->setAbreviatura($data['abreviatura_antiretroviral']);
        $antiretroviral->setDescripcion($data['descripcion_antiretroviral']);
            
        $this->em->persist($antiretroviral);
        $status = $this->em->flush();
        return true;
	}
}
