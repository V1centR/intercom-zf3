<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permissoesformulariosusuarios
 *
 * @ORM\Table(name="permissoesformulariosusuarios", indexes={@ORM\Index(name="FK_PermissoesFormulariosUsuarios_Formularios", columns={"formularioId"}), @ORM\Index(name="FK_PermissoesFormulariosUsuarios_Usuario", columns={"usuarioId"})})
 * @ORM\Entity
 */
class Permissoesformulariosusuarios
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
     * @var \Shopping\Entity\Formularios
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Formularios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formularioId", referencedColumnName="id")
     * })
     */
    private $formularioid;

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

