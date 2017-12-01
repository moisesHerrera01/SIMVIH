<?php
namespace Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Mapping as ORM;

/**
*
* @Entity
* @Table(name="paciente_info_var")
*/
class PacienteEstado
{
    /**
    * @Column(type="integer", name="id_paciente_info_var", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="decimal", name="peso", nullable=false, unique=true)
    */
    protected $peso;
    /**
    * @Column(type="integer", name="ingresos_12_meses")
    */
    protected $ingresos;
     /**
     * @ManyToOne(targetEntity="Paciente", inversedBy="estados")
     * @JoinColumn(name="id_paciente", referencedColumnName="id_paciente")
     */
    protected $paciente;
    /**
    * @Column(type="string", name="servicio_atencion", nullable=false, unique=true)
    */
    protected $servicio;
    /**
    * @Column(type="string", name="estado_actual", nullable=false, unique=true)
    */
    protected $estado;
     /**
     * @OneToOne(targetEntity="Antiretroviral")
     * @JoinColumn(name="id_esquema_arv", referencedColumnName="id_esquema_arv")
     */
     protected $arv;
    /**
    * @Column(type="string", name="clasificacion_oms", nullable=false, unique=true)
    */
    protected $clasificacion;
    /**
    * @Column(type="string", name="criterio_arv", nullable=false, unique=true)
    */
    protected $criterio_arv;
    /**
    * @Column(type="string", name="criterio_cambio_arv", nullable=false, unique=true)
    */
    protected $criterio_cambio_arv;
    /**
    * @Column(type="string", name="tipo_paciente", nullable=false, unique=true)
    */
    protected $tipo;
    /**
    * @Column(type="string", name="criterio_egreso_arv", nullable=false, unique=true)
    */
    protected $egreso;
    /**
    * @Column(type="string", name="medico_responsable", nullable=false, unique=true)
    */
    protected $medico;
    /**
     * @OneToOne(targetEntity="GradoAutonomia")
     * @JoinColumn(name="id_grado_autonomia", referencedColumnName="id_grado_autonomia")
     */
     protected $grado;
     /**
     * Tag constructor.
     */
    public function getId()
    {
        return $this->id;
    }
    public function getPeso()
    {
        return $this->peso;
    }    
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }
    public function getIngresos()
    {
        return $this->ingresos;
    }
    public function setIngresos($ingresos)
    {
        $this->ingresos = $ingresos;
    }
    public function getPaciente()
    {
        return $this->paciente;
    }
    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getArv()
    {
        return $this->arv;
    }
    public function setArv($arv)
    {
        $this->arv = $arv;
    }
    public function getClasificacion()
    {
        return $this->clasificacion;
    }
    public function setClasificacion($clasificacion)
    {
        $this->clasificacion = $clasificacion;
    }
    public function getCriterioArv()
    {
        return $this->criterio_arv;
    }
    public function setCriterioArv($criterio_arv)
    {
        $this->criterio_arv = $criterio_arv;
    }
    public function getCriterioCambioArv()
    {
        return $this->criterio_cambio_arv;
    }
    public function setCriterioCambioArv($criterio_cambio_arv)
    {
        $this->criterio_cambio_arv = $criterio_cambio_arv;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function getEgreso()
    {
        return $this->egreso;
    }
    public function setEgreso($egreso)
    {
        $this->egreso = $egreso;
    }
    public function getMedico()
    {
        return $this->medico;
    }
    public function setMedico($medico)
    {
        $this->medico = $medico;
    }
    public function getGrado()
    {
        return $this->grado;
    }
    public function setGrado($grado)
    {
        $this->grado = $grado;
    }   
}
