<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modulosusuario
 *
 * @ORM\Table(name="modulosusuario", indexes={@ORM\Index(name="FK_ModulosUsuario_Modulos", columns={"moduloId"}), @ORM\Index(name="FK_ModulosUsuario_Usuario", columns={"usuarioId"})})
 * @ORM\Entity
 */
class Modulosusuario
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
     * @var integer
     *
     * @ORM\Column(name="ordem", type="integer", nullable=true)
     */
    private $ordem;

    /**
     * @var string
     *
     * @ORM\Column(name="incluso", type="string", length=1, nullable=true)
     */
    private $incluso;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;

    /**
     * @var \Shopping\Entity\Modulos
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Modulos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="moduloId", referencedColumnName="id")
     * })
     */
    private $moduloid;

    /**
     * @var \Shopping\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuarioId", referencedColumnName="id")
     * })
     */
    private $usuarioid;


}

