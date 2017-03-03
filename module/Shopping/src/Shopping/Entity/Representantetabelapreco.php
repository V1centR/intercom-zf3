<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Representantetabelapreco
 *
 * @ORM\Table(name="representantetabelapreco", indexes={@ORM\Index(name="FK_RepresentanteTabelaPreco_Representante", columns={"representanteId"}), @ORM\Index(name="FK_RepresentanteTabelaPreco_TabelaPrecos", columns={"tabelaprecosId"})})
 * @ORM\Entity
 */
class Representantetabelapreco
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
     * @var \Shopping\Entity\Representante
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Representante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="representanteId", referencedColumnName="id")
     * })
     */
    private $representanteid;

    /**
     * @var \Shopping\Entity\Tabelaprecos
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Tabelaprecos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tabelaprecosId", referencedColumnName="id")
     * })
     */
    private $tabelaprecosid;


}

