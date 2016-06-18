<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @ORM\Column(name="foto", type="text", length=65535, nullable=true)
     */
    private $foto;

    /**
     * @var integer
     *
     * @ORM\Column(name="instituicao", type="integer", nullable=true)
     */
    private $instituicao;

    /**
     * @var string
     *
     * @ORM\Column(name="id_facebook", type="string", length=40, nullable=true)
     */
    private $idFacebook;



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
     * @param integer $instituicao
     *
     * @return Usuario
     */
    public function setInstituicao($instituicao)
    {
        $this->instituicao = $instituicao;

        return $this;
    }

    /**
     * Get instituicao
     *
     * @return integer
     */
    public function getInstituicao()
    {
        return $this->instituicao;
    }

    /**
     * Set idFacebook
     *
     * @param string $idFacebook
     *
     * @return Usuario
     */
    public function setIdFacebook($idFacebook)
    {
        $this->idFacebook = $idFacebook;

        return $this;
    }

    /**
     * Get idFacebook
     *
     * @return string
     */
    public function getIdFacebook()
    {
        return $this->idFacebook;
    }
}
