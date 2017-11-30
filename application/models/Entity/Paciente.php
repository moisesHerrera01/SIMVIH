<?php
namespace Entity;
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
}
