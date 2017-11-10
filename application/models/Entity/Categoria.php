<?php namespace Entity;
/**
*
* @Entity
* @Table(name="categoria")
*/
class Categoria
{
    /**
    * @ORM\Column(type="integer", name="idCategoria", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="SEQUENCE")
    * @ORM\SequenceGenerator(sequenceName="public.categoria_idCategoria_seq", allocationSize=1,initialValue=1)
    */
    protected $id;
    /**
    * @ORM\Column(type="string", name="nomeCategoria")
    */
    protected $nome;
    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}
