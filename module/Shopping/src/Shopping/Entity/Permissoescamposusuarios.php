<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permissoescamposusuarios
 *
 * @ORM\Table(name="permissoescamposusuarios", indexes={@ORM\Index(name="FK_PermissoesCamposUsuarios_CamposFormulario", columns={"campoId"}), @ORM\Index(name="FK_PermissoesCamposUsuarios_Usuario", columns={"usuarioId"})})
 * @ORM\Entity
 */
class Permissoescamposusuarios
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
     * @ORM\Column(name="visualizar", type="string", length=1, nullable=true)
     */
    private $visualizar = 'S';

    /**
     * @var string
     *
     * @ORM\Column(name="editar", type="string", length=1, nullable=true)
     */
    private $editar = 'S';

    /**
     * @var string
     *
     * @ORM\Column(name="configurar", type="string", length=1, nullable=true)
     */
    private $configurar = 'S';

    /**
     * @var \Shopping\Entity\Camposformulario
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Camposformulario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="campoId", referencedColumnName="id")
     * })
     */
    private $campoid;

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

