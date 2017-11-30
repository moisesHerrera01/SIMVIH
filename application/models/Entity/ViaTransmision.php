<?php
namespace Entity;
use Doctrine\Mapping as ORM;

/**
*
* @Entity
* @Table(name="via_transmision")
*/
class ViaTransmision
{
    /**
    * @Column(type="integer", name="id_via_transmision", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="string", name="nombre", nullable=false, unique=true)
    */
    protected $nombre;
    /**
    * @Column(type="string", name="descripcion", nullable = false)
    */
    protected $descripcion;


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
   
}
