<?php namespace Entity;

/**
*
* @Entity
* @Table(name="categoria")
*/
class Categoria
{
    /**
    * @Column(type="integer", name="id_categoria", nullable=false)
    * @Id
    * @GeneratedValue(strategy="IDENTITY")
    */
    protected $id;
    /**
    * @Column(type="string", name="nome_categoria")
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
