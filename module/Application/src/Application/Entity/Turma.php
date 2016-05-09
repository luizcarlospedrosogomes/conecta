<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Turma
 *
 * @ORM\Table(name="turma", indexes={@ORM\Index(name="IDX_2B0219A62265B05D", columns={"usuario"}), @ORM\Index(name="IDX_2B0219A67CFF8F69", columns={"instituicao"})})
 * @ORM\Entity
 */
class Turma
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="turma_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=20, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="data_criacao", type="string", length=10, nullable=true)
     */
    private $dataCriacao;

    /**
     * @var integer
     *
     * @ORM\Column(name="ativo", type="integer", nullable=true)
     */
    private $ativo;

    /**
     * @var \Application\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Application\Entity\Instituicao
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Instituicao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="instituicao", referencedColumnName="id")
     * })
     */
    private $instituicao;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Turma
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set dataCriacao
     *
     * @param string $dataCriacao
     *
     * @return Turma
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * Get dataCriacao
     *
     * @return string
     */
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    /**
     * Set ativo
     *
     * @param integer $ativo
     *
     * @return Turma
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return integer
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set usuario
     *
     * @param \Application\Entity\Usuario $usuario
     *
     * @return Turma
     */
    public function setUsuario(\Application\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Application\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set instituicao
     *
     * @param \Application\Entity\Instituicao $instituicao
     *
     * @return Turma
     */
    public function setInstituicao(\Application\Entity\Instituicao $instituicao = null)
    {
        $this->instituicao = $instituicao;

        return $this;
    }

    /**
     * Get instituicao
     *
     * @return \Application\Entity\Instituicao
     */
    public function getInstituicao()
    {
        return $this->instituicao;
    }
	
	//sql join
	
}
