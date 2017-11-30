<?php
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Mapping as ORM;

/**
*
* @Entity
* @Table(name="enfermedades_oportunistas")
*/
class EnfermedadOportunista
{
    /**
    * @Column(type="integer", name="id_enfermedades_oportunistas", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="string", name="nombre", nullable=false)
    */
    protected $nombre;
    /**
    * @Column(type="string", name="descripcion")
    */
    protected $descripcion;
    /**
     * @ManyToMany(targetEntity="Paciente", mappedBy="enfermedades")
     **/
    private $pacientes;

    public function __construct()
    {

        $this->pacientes = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function addPaciente(Paciente $p = null){
        if (!$this->pacientes->contains($p)) {
            $this->pacientes->add($p);
            $p->addEnfermedad($this);
        }
    }    
}
