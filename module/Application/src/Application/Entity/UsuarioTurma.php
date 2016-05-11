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
     * @var \Application\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;

    /**
     * @var \Application\Entity\Turma
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Turma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_turma", referencedColumnName="id")
     * })
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
     * @param \Application\Entity\Usuario $idUsuario
     *
     * @return UsuarioTurma
     */
    public function setIdUsuario(\Application\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \Application\Entity\Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idTurma
     *
     * @param \Application\Entity\Turma $idTurma
     *
     * @return UsuarioTurma
     */
    public function setIdTurma(\Application\Entity\Turma $idTurma = null)
    {
        $this->idTurma = $idTurma;

        return $this;
    }

    /**
     * Get idTurma
     *
     * @return \Application\Entity\Turma
     */
    public function getIdTurma()
    {
        return $this->idTurma;
    }
}
