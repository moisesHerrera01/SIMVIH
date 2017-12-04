<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/Entity/Usuario.php");

class Login_model extends CI_Model
{
	private $em;

	public function __construct()
	{
    parent::__construct();
    $em=$this->em = $this->doctrine->em;
	}

	public function checkLogin(){
    $this->load->library('encryption');
		$usuario = $this->em->getRepository('Entity\\Usuario');
		$uname = $this->input->post("uname");
    $pass = $this->input->post("pw");
    $user = $usuario->findOneBy(array('nombre' => $uname));

		if ($user){
      $pw_plano=$this->encryption->decrypt($user->getPassword());
      if ($pass==$pw_plano) {
        $newdata = array(
                     'username'  => $uname,
                     'rol' => $user->getRol()->getNombre(),
                     'logged_in' => TRUE
                 );
        $this->session->set_userdata($newdata);
        return true;
      }else {
        return false;
      }
		}
	}
}
