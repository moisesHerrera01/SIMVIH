<?php 
namespace Entity;
/**
*
* @Entity
* @Table(name="esquema_arv")
*/
class Antiretroviral
{
    /**
    * @Column(type="integer", name="id_esquema_arv", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="string", name="nombre")
    */
    protected $nombre;
    /**
    * @Column(type="string", name="abreviatura")
    */
    protected $abreviatura;
    /**
    * @Column(type="string", name="descripcion")
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
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
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
