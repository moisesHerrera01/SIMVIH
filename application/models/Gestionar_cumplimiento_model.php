<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/Entity/Cumplimiento.php");


class Gestionar_cumplimiento_model extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine->em;
	}

	public function createCumplimiento($data)
	{
		$cumplimiento = new Entity\Cumplimiento();
		
		$paciente= $this->em->find('Entity\\Paciente',$data['paciente_cumplimiento']);

        $cumplimiento->setPaciente($paciente);
        $cumplimiento->setAsesoriaPrePrueba($data['asesoria_pre_prueba_cumplimiento']);
        $cumplimiento->setAsesoriaPostPrueba($data['asesoria_post_prueba_cumplimiento']);
        $cumplimiento->setAsesoriaPreEmbarazo($data['asesoria_pre_embarazo_cumplimiento']);
        $cumplimiento->setAsesoriaPostEmbarazo($data['asesoria_post_embarazo_cumplimiento']);
        $cumplimiento->setAnticonceptivos($data['anticonceptivos_cumplimiento']);
		$cumplimiento->setCharlaContagio($data['charla_contagio_cumplimiento']);
		$cumplimiento->setCharlaPrevencion($data['charla_prevencion_cumplimiento']);
		$cumplimiento->setGrupoLuchaVih($data['grupo_lucha_vih_cumplimiento']);
        $cumplimiento->setCharlaAutocuidado($data['charla_autocuidado_cumplimiento']);
        $cumplimiento->setCharlaAlimentacion($data['charla_alimentacion_cumplimiento']);
        $cumplimiento->setFechaPrueba($data['fecha_prueba_cumplimiento']);
        $cumplimiento->setFechaInicioCharlas($data['fecha_inicio_charlas_cumplimiento']);
        $cumplimiento->setCharlaSexualidad($data['charla_sexualidad_cumplimiento']);
        $cumplimiento->setEvaluacionPsicologica($data['evaluacion_psicologica_cumplimiento']);
        $cumplimiento->setEvaluacionNutricionista($data['evaluacion_nutricionista_cumplimiento']);
        $cumplimiento->setLactanciaMaterna($data['lactancia_materna_cumplimiento']);
		
            
        $this->em->persist($cumplimiento);
        $status = $this->em->flush();
        return true;
    }

    public function removeCumplimiento($id) {
        $cumplimiento = $this->em->find('Entity\\Cumplimiento', $id);
        $this->em->remove($cumplimiento);
        $this->em->flush();
    }
    
    public function getCumplimientos() {
        
        $cumplimientos = $this->em->getRepository('Entity\\Cumplimiento');
		$cpls = $cumplimientos->findAll();
		return $cpls;

    }

    public function getReporteNorma($clinica, $fecha_inicial, $fecha_final) {
        
        $normas = $this->em->createQueryBuilder()
                            ->select('a, b, c')
                            ->from('Entity\\Cumplimiento', 'a')
                            ->innerJoin('a.paciente', 'b')
                            ->innerJoin('b.clinica', 'c')
                            ->where('c.id = ?1')
                            ->where('a.fecha_prueba between ?2 AND ?3')
                            ->setParameter( 1, $clinica )
                            ->setParameters( array( '2' => $fecha_inicial, '3' => $fecha_final ) )
                            ->getQuery()
                            ->execute();

        return $normas;

    }

    public function getClinicas() {
        $clinica = $this->em->getRepository('Entity\\Clinica');
		$cls = $clinica->findAll();
		return $cls;
    }
}
