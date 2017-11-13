<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rol extends CI_Controller {
	public function add()
	{
		// Instancia o objeto Categoria
		$rol = new Entity\Rol();
		// Define um nome para a categoria
	    $rol->setNombre('Supervisor');
			$rol->setDescripcion('Supervisor');
		// Aplica a persistência dos dados e executa a inserção no banco
	    $this->doctrine->em->persist($rol);
	    $this->doctrine->em->flush();
	}
}
