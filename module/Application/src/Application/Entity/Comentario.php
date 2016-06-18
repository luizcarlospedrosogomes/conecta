<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentario")
 * @ORM\Entity
 */
class Comentario
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
     * @ORM\Column(name="usuario", type="string", length=40, nullable=false)
     */
    private $usuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="instituicao", type="integer", nullable=true)
     */
    private $instituicao;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudo", type="text", length=65535, nullable=true)
     */
    private $conteudo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_post", type="integer", nullable=true)
     */
    private $idPost;

    /**
     * @var string
     *
     * @ORM\Column(name="data_comentario", type="string", length=12, nullable=true)
     */
    private $dataComentario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_turma", type="integer", nullable=true)
     */
    private $idTurma;



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
     * @return Comentario
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
     * Set instituicao
     *
     * @param integer $instituicao
     *
     * @return Comentario
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
     * Set conteudo
     *
     * @param string $conteudo
     *
     * @return Comentario
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
     * Set idPost
     *
     * @param integer $idPost
     *
     * @return Comentario
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;

        return $this;
    }

    /**
     * Get idPost
     *
     * @return integer
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * Set dataComentario
     *
     * @param string $dataComentario
     *
     * @return Comentario
     */
    public function setDataComentario($dataComentario)
    {
        $this->dataComentario = $dataComentario;

        return $this;
    }

    /**
     * Get dataComentario
     *
     * @return string
     */
    public function getDataComentario()
    {
        return $this->dataComentario;
    }

    /**
     * Set idTurma
     *
     * @param integer $idTurma
     *
     * @return Comentario
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
}
