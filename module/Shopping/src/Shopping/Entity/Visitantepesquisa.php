<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitantepesquisa
 *
 * @ORM\Table(name="visitantepesquisa", indexes={@ORM\Index(name="FK_VisitantePesquisa_Visitante", columns={"visitanteId"})})
 * @ORM\Entity
 */
class Visitantepesquisa
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
     * @ORM\Column(name="texto", type="string", length=50, nullable=true)
     */
    private $texto;

    /**
     * @var \Shopping\Entity\Visitante
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Visitante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitanteId", referencedColumnName="id")
     * })
     */
    private $visitanteid;


}

