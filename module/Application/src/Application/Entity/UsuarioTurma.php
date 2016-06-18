<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioTurma
 *
 * @ORM\Table(name="usuario_turma")
 * @ORM\Entity
 */
class UsuarioTurma
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
     * @ORM\Column(name="id_usuario", type="string", length=40, nullable=false)
     */
    private $idUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_turma", type="integer", nullable=false)
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
     * Set idUsuario
     *
     * @param string $idUsuario
     *
     * @return UsuarioTurma
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return string
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idTurma
     *
     * @param integer $idTurma
     *
     * @return UsuarioTurma
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
