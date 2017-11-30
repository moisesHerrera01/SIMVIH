<?php
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Mapping as ORM;

/**
*
* @Entity
* @Table(name="paciente")
*/
class Paciente
{
    /**
    * @Column(type="integer", name="id_paciente", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="integer", name="numero_expediente", nullable=false, unique=true)
    */
    protected $numero;
    /**
    * @Column(type="string", name="fecha_diagnostico_vih")
    */
    protected $fecha;
     /**
     * @OneToOne(targetEntity="Clinica")
     * @JoinColumn(name="id_clinica", referencedColumnName="id_clinica")
     */
    protected $clinica;
     /**
     * @OneToOne(targetEntity="ViaTransmision")
     * @JoinColumn(name="id_via_transmision", referencedColumnName="id_via_transmision")
     */
     protected $via;
     /**
     * @ManyToMany(targetEntity="EnfermedadOportunista", inversedBy="pacientes")
     * @JoinTable(name="paciente_enfermedades_oportunistas",
        joinColumns={@JoinColumn(name="id_paciente", referencedColumnName="id_paciente")},
        inverseJoinColumns={@JoinColumn(name="id_enfermedades_oportunistas", referencedColumnName="id_enfermedades_oportunistas")})
     **/
     private $enfermedades;

     /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->enfermedades = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNumero()
    {
        return $this->numero;
    }    
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getClinica()
    {
        return $this->clinica;
    }
    public function setClinica($clinica)
    {
        $this->clinica = $clinica;
    }
    public function getVia()
    {
        return $this->via;
    }
    public function setVia($via)
    {
        $this->via = $via;
    }
    public function addEnfermedad(EnfermedadOportunista $enf = null){
        if (!$this->enfermedades->contains($enf)) {
            $this->enfermedades->add($enf);
            $enf->addPaciente($this);
        }
    }
    public function getEnfermedades(){
        return $this->enfermedades->toArray();
    }
}
