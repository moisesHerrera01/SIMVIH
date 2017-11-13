<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller {
	public function add()
	{
		$this->load->library('encrypt');

			$rol = new Entity\Rol();
			$rol->setNombre('Otro');
			$this->doctrine->em->persist($rol);
			$this->doctrine->em->flush();

			$usuario = new Entity\Usuario();
			$usuario->setNombre('moises.herrera');
			$password=$this->encrypt->encode('holamundo');
			$usuario->setPassword($password);
			$usuario->setActivo('si');
			$usuario->setRol($rol);
			$usuario->setEmpleado('Moises Herrera');
	    $this->doctrine->em->persist($usuario);
	    $this->doctrine->em->flush();
	}
}
