<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioTurma
 *
 * @ORM\Table(name="usuario_turma", uniqueConstraints={@ORM\UniqueConstraint(name="usuario_turma_id_usuario_id_turma_key", columns={"id_usuario", "id_turma"})}, indexes={@ORM\Index(name="IDX_36DC73B8FCF8192D", columns={"id_usuario"}), @ORM\Index(name="IDX_36DC73B8C5875896", columns={"id_turma"})})
 * @ORM\Entity
 */
class UsuarioTurma
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="usuario_turma_id_seq", allocationSize=1, initialValue=1)
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
     * @param \integer
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
