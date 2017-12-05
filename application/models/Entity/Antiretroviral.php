<?php 
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;
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
    * @Column(type="integer", name="numero_producto", nullable=false)
    */
    protected $numero;
    /**
    * @Column(type="string", name="descripcion")
    */
    protected $descripcion;
    /**
     * @OneToMany(targetEntity="PacienteEstado", mappedBy="arv")
     */
     private $arv_estados;

    public function __construct()
    {
        $this->arv_estados = new ArrayCollection();
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
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    }
     public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getArvEstados(){
        return $this->arv_estados->toArray();
    }

}
