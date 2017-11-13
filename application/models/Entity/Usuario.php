<?php
namespace Entity;
use Doctrine\Mapping as ORM;

/**
*
* @Entity
* @Table(name="usuario")
*/
class Usuario
{
    /**
    * @Column(type="integer", name="id_usuario", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="string", name="nombre_usuario", nullable=false, unique=true)
    */
    protected $nombre;
    /**
    * @Column(type="string", name="password", nullable=false)
    */
    protected $password;
    /**
    * @Column(type="string", name="activo", nullable=false)
    */
    protected $activo;
     /**
     * @OneToOne(targetEntity="Rol")
     * @JoinColumn(name="id_rol", referencedColumnName="id_rol")
     */
     protected $rol;
     /**
     * @Column(type="string", name="nombre_empleado", nullable=false)
     */
     protected $empleado;


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
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getActivo()
    {
        return $this->activo;
    }
    public function setActivo($activo)
    {
        $this->activo = $activo;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
    }
    public function getEmpleado()
    {
        return $this->empleado;
    }
    public function setEmpleado($empleado)
    {
        $this->empleado = $empleado;
    }
}
