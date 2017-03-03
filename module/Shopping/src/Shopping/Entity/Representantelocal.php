<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Representantelocal
 *
 * @ORM\Table(name="representantelocal", indexes={@ORM\Index(name="FK_RepresentanteLocal_Local", columns={"localId"}), @ORM\Index(name="FK_RepresentanteLocal_Representante", columns={"representanteId"})})
 * @ORM\Entity
 */
class Representantelocal
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
     * @var \Shopping\Entity\Local
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="localId", referencedColumnName="id")
     * })
     */
    private $localid;

    /**
     * @var \Shopping\Entity\Representante
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Representante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="representanteId", referencedColumnName="id")
     * })
     */
    private $representanteid;


}

