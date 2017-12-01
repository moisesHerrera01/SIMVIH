<?php
namespace Entity;
use Doctrine\Mapping as ORM;

/**
*
* @Entity
* @Table(name="grado_autonomia")
*/
class GradoAutonomia
    {
    /**
    * @Column(type="integer", name="id_grado_autonomia", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="string", name="deambulacion", nullable=false, unique=true)
    */
    protected $deambulacion;
    /**
    * @Column(type="string", name="alimentacion", nullable=false, unique=true)
    */
    protected $alimentacion;
    /**
    * @Column(type="string", name="aseo", nullable=false, unique=true)
    */
    protected $aseo;

    public function getId()
    {
        return $this->id;
    }
    public function getDeambulacion()
    {
        return $this->deambulacion;
    }    
    public function setDeambulacion($deambulacion)
    {
        $this->deambulacion = $deambulacion;
    }
    public function getAlimentacion()
    {
        return $this->alimentacion;
    }
    public function setAlimentacion($alimentacion)
    {
        $this->alimentacion = $alimentacion;
    }
    public function getAseo()
    {
        return $this->aseo;
    }
    public function setAseo($aseo)
    {
        $this->aseo = $aseo;
    }
   
}