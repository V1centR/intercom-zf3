<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristicaopcoes
 *
 * @ORM\Table(name="caracteristicaopcoes", indexes={@ORM\Index(name="FK_CaracteristicaOpcoes_Caracteristicas", columns={"caracteristicaId"})})
 * @ORM\Entity
 */
class Caracteristicaopcoes
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
     * @ORM\Column(name="opcao", type="string", length=25, nullable=true)
     */
    private $opcao;

    /**
     * @var \Shopping\Entity\Caracteristicas
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Caracteristicas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="caracteristicaId", referencedColumnName="id")
     * })
     */
    private $caracteristicaid;


}

