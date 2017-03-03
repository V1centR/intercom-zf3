<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Freteuf
 *
 * @ORM\Table(name="freteuf", indexes={@ORM\Index(name="FK_FreteUF_Frete", columns={"freteId"}), @ORM\Index(name="FK_FreteUF_UF", columns={"UFId"})})
 * @ORM\Entity
 */
class Freteuf
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
     * @var \Shopping\Entity\Frete
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Frete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="freteId", referencedColumnName="id")
     * })
     */
    private $freteid;

    /**
     * @var \Shopping\Entity\Uf
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Uf")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UFId", referencedColumnName="id")
     * })
     */
    private $ufid;


}

