<?php namespace Entity;

/**
*
* @Entity
* @Table(name="rol")
*/
class Rol
{
    /**
    * @Column(type="integer", name="id_rol", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="string", name="nombre_rol", nullable=false)
    */
    protected $nombre;
    /**
    * @Column(type="string", name="descripcion_rol")
    */
    protected $desc;
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
        return $this->desc;
    }
    public function setDescripcion($desc)
    {
        $this->desc = $desc;
    }
}
