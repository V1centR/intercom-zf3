<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Variacaopropriedade
 *
 * @ORM\Table(name="variacaopropriedade", indexes={@ORM\Index(name="FK_VariacaoPropriedade_Propriedade", columns={"propriedadeId"})})
 * @ORM\Entity
 */
class Variacaopropriedade
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
     * @ORM\Column(name="nome", type="string", length=50, nullable=true)
     */
    private $nome;

    /**
     * @var \Shopping\Entity\Variacao
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Variacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="propriedadeId", referencedColumnName="id")
     * })
     */
    private $propriedadeid;


}

