<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/Entity/Usuario.php");


class Gestionar_usuarios_model extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine->em;
	}

	public function createUser($data)
	{
    $this->load->library('encryption');
    //$rolRepo = $this->em->getRepository('Entity\\Rol');
    $rol= $this->em->find('Entity\\Rol',$data['rol']);
		$user = new Entity\Usuario();
    $user->setEmpleado($data['empleado']);
		$user->setNombre($data['nombre']);
		$user->setPassword($this->encryption->encrypt($data['password']));
    $user->setActivo($data['activo']);
    $user->setRol($rol);
		$this->em->persist($user);
		$status = $this->em->flush();
		return true;
	}
}
