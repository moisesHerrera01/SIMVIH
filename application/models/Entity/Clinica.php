<?php
namespace Entity;
use Doctrine\Mapping as ORM;

/**
*
* @Entity
* @Table(name="clinica")
*/
class Clinica
{
    /**
    * @Column(type="integer", name="id_clinica", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="string", name="nombre", nullable=false, unique=true)
    */
    protected $nombre;
    /**
    * @Column(type="integer", name="numero_establecimiento", nullable=false, unique=true)
    */
    protected $numero;
    /**
    * @Column(type="string", name="direccion")
    */
    protected $direccion;
    /**
    * @OneToMany(targetEntity="Paciente", mappedBy="clinica")
    */
    protected $pacientes_cli;

    public function __construct()
    {
        $this->pacientes_cli = new ArrayCollection();
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
     public function getNumero()
    {
        return $this->numero;
    }    
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($descripcion)
    {
        $this->direccion = $direccion;
    }
    public function getPacientesCli(){
        return $this->pacientes_cli->toArray();
    }
   
}