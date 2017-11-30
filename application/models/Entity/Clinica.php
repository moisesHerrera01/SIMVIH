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
    * @Column(type="string", name="direccion")
    */
    protected $direccion;


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
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($descripcion)
    {
        $this->direccion = $direccion;
    }
   
}