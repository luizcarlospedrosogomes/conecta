<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="IDX_2265B05D7CFF8F69", columns={"instituicao"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=40, nullable=false)
     * @ORM\Id

     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=240, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="text", nullable=true)
     */
    private $foto;

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
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set id
     *
     * @param string $id
     *
     * @return Usuario
     */
    public function setID($id)
    {
        $this->id    = $id;

        return $this;
    }
    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Usuario
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
     * Set foto
     *
     * @param string $foto
     *
     * @return Usuario
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set instituicao
     *
     * @param \Application\Entity\Instituicao $instituicao
     *
     * @return Usuario
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
}
