<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", indexes={@ORM\Index(name="fk_grade_id", columns={"usuario"})})
 * @ORM\Entity
 */
class Post
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
     * @ORM\Column(name="usuario", type="string", length=40, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=35, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudo", type="text", length=65535, nullable=true)
     */
    private $conteudo;

    /**
     * @var string
     *
     * @ORM\Column(name="data_post", type="string", length=14, nullable=true)
     */
    private $dataPost;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_turma", type="integer", nullable=true)
     */
    private $idTurma;

    /**
     * @var integer
     *
     * @ORM\Column(name="instituicao", type="integer", nullable=true)
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
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Post
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
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
     * Set idTurma
     *
     * @param integer $idTurma
     *
     * @return Post
     */
    public function setIdTurma($idTurma)
    {
        $this->idTurma = $idTurma;

        return $this;
    }

    /**
     * Get idTurma
     *
     * @return integer
     */
    public function getIdTurma()
    {
        return $this->idTurma;
    }

    /**
     * Set instituicao
     *
     * @param integer $instituicao
     *
     * @return Post
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
}
