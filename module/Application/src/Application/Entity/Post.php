<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="IDX_5A8A6C8D2265B05D", columns={"usuario"}), @ORM\Index(name="IDX_5A8A6C8D7CFF8F69", columns={"instituicao"})})
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="post_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=50, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudo", type="text", nullable=false)
     */
    private $conteudo;

    /**
     * @var string
     *
     * @ORM\Column(name="data_post", type="string", length=10, nullable=false)
     */
    private $dataPost;

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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set conteudo
     *
     * @param string $conteudo
     *
     * @return Post
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    /**
     * Get conteudo
     *
     * @return string
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * Set dataPost
     *
     * @param string $dataPost
     *
     * @return Post
     */
    public function setDataPost($dataPost)
    {
        $this->dataPost = $dataPost;

        return $this;
    }

    /**
     * Get dataPost
     *
     * @return string
     */
    public function getDataPost()
    {
        return $this->dataPost;
    }

    /**
     * Set usuario
     *
     * @param \Application\Entity\Usuario $usuario
     *
     * @return Post
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
     * @return Post
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
