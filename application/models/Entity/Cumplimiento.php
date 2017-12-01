<?php 
namespace Entity;
/**
*
* @Entity
* @Table(name="formulario_cumplimiento")
*/
class Cumplimiento
{
    /**
    * @Column(type="integer", name="id_formulario_cumplimiento", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
     * @OneToOne(targetEntity="Paciente")
     * @JoinColumn(name="id_paciente", referencedColumnName="id_paciente")
     */
    protected $paciente;
    /**
    * @Column(type="boolean", name="asesoria_pre_prueba")
    */
    protected $asesoria_pre_prueba;
    /**
    * @Column(type="boolean", name="asesoria_post_prueba")
    */
    protected $asesoria_post_prueba;
    /** 
    * @Column(type="string", name="asesoria_pre_embarazo", columnDefinition="ENUM('No aplica', 'Si', 'No')") 
    */
    protected $asesoria_pre_embarazo;
    /** 
    * @Column(type="string", name="asesoria_post_embarazo", columnDefinition="ENUM('No aplica', 'Si', 'No')") 
    */
    protected $asesoria_post_embarazo;
    /**
    * @Column(type="boolean", name="anticonceptivos")
    */
    protected $anticonceptivos;
    /**
    * @Column(type="boolean", name="charla_contagio")
    */
    protected $charla_contagio;
    /**
    * @Column(type="boolean", name="charla_prevencion")
    */
    protected $charla_prevencion;
    /**
    * @Column(type="boolean", name="grupo_lucha_vih")
    */
    protected $grupo_lucha_vih;
    /**
    * @Column(type="boolean", name="charla_autocuidado")
    */
    protected $charla_autocuidado;
    /**
    * @Column(type="boolean", name="charla_alimentacion")
    */
    protected $charla_alimentacion;
    /**
    * @Column(type="string", name="fecha_prueba")
    */
    protected $fecha_prueba;
    /**
    * @Column(type="string", name="fecha_inicio_charlas")
    */
    protected $fecha_inicio_charlas;
    /**
    * @Column(type="boolean", name="charla_sexualidad")
    */
    protected $charla_sexualidad;
    /**
    * @Column(type="boolean", name="evaluacion_psicologica")
    */
    protected $evaluacion_psicologica;
    /**
    * @Column(type="boolean", name="evaluacion_nutricionista")
    */
    protected $evaluacion_nutricionista;
    /** 
    * @Column(type="string", name="lactancia_materna", columnDefinition="ENUM('No aplica', 'Si', 'No')") 
    */
    protected $lactancia_materna;

    public function getId()
    {
        return $this->id;
    }
    public function getPaciente()
    {
        return $this->paciente;
    }
    public function setPaciente($paciente)
    {
        $this->paciente = $paciente;
    }
    public function getAsesoriaPrePrueba()
    {
        return $this->asesoria_pre_prueba;
    }
    public function setAsesoriaPrePrueba($asesoria_pre_prueba)
    {
        $this->asesoria_pre_prueba = $asesoria_pre_prueba;
    }
    public function getAsesoriaPostPrueba()
    {
        return $this->asesoria_post_prueba;
    }
    public function setAsesoriaPostPrueba($asesoria_post_prueba)
    {
        $this->asesoria_post_prueba = $asesoria_post_prueba;
    }
    public function getAsesoriaPreEmbarazo()
    {
        return $this->asesoria_pre_embarazo;
    }
    public function setAsesoriaPreEmbarazo($asesoria_pre_embarazo)
    {
        $this->asesoria_pre_embarazo = $asesoria_pre_embarazo;
    }
    public function getAsesoriaPostEmbarazo()
    {
        return $this->asesoria_post_embarazo;
    }
    public function setAsesoriaPostEmbarazo($asesoria_post_embarazo)
    {
        $this->asesoria_post_embarazo = $asesoria_post_embarazo;
    }
    public function getAnticonceptivos()
    {
        return $this->anticonceptivos;
    }
    public function setAnticonceptivos($anticonceptivos)
    {
        $this->anticonceptivos = $anticonceptivos;
    }
    public function getCharlaContagio()
    {
        return $this->charla_contagio;
    }
    public function setCharlaContagio($charla_contagio)
    {
        $this->charla_contagio = $charla_contagio;
    }
    public function getCharlaPrevencion()
    {
        return $this->charla_prevencion;
    }
    public function setCharlaPrevencion($charla_prevencion)
    {
        $this->charla_prevencion = $charla_prevencion;
    }
    public function getGrupoLuchaVih()
    {
        return $this->grupo_lucha_vih;
    }
    public function setGrupoLuchaVih($grupo_lucha_vih)
    {
        $this->grupo_lucha_vih = $grupo_lucha_vih;
    }
    public function getCharlaAutocuidado()
    {
        return $this->charla_autocuidado;
    }
    public function setCharlaAutocuidado($charla_autocuidado)
    {
        $this->charla_autocuidado = $charla_autocuidado;
    }
    public function getCharlaAlimentacion()
    {
        return $this->charla_alimentacion;
    }
    public function setCharlaAlimentacion($charla_alimentacion)
    {
        $this->charla_alimentacion = $charla_alimentacion;
    }
    public function getFechaPrueba()
    {
        return $this->fecha_prueba;
    }
    public function setFechaPrueba($fecha_prueba)
    {
        $this->fecha_prueba = $fecha_prueba;
    }
    public function getFechaInicioCharlas()
    {
        return $this->fecha_inicio_charlas;
    }
    public function setFechaInicioCharlas($fecha_inicio_charlas)
    {
        $this->fecha_inicio_charlas = $fecha_inicio_charlas;
    }
    public function getCharlaSexualidad()
    {
        return $this->charla_sexualidad;
    }
    public function setCharlaSexualidad($charla_sexualidad)
    {
        $this->charla_sexualidad = $charla_sexualidad;
    }
    public function getEvaluacionPsicologica()
    {
        return $this->evaluacion_psicologica;
    }
    public function setEvaluacionPsicologica($evaluacion_psicologica)
    {
        $this->evaluacion_psicologica = $evaluacion_psicologica;
    }
    public function getEvaluacionNutricionista()
    {
        return $this->evaluacion_nutricionista;
    }
    public function setEvaluacionNutricionista($evaluacion_nutricionista)
    {
        $this->evaluacion_nutricionista = $evaluacion_nutricionista;
    }
    public function getLactanciaMaterna()
    {
        return $this->lactancia_materna;
    }
    public function setLactanciaMaterna($lactancia_materna)
    {
        $this->lactancia_materna = $lactancia_materna;
    }
}
