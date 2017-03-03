<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estoque
 *
 * @ORM\Table(name="estoque", indexes={@ORM\Index(name="FK_Estoque_Local", columns={"localId"}), @ORM\Index(name="FK_Estoque_Produto", columns={"produtoId"})})
 * @ORM\Entity
 */
class Estoque
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
     * @ORM\Column(name="quantidade", type="decimal", precision=10, scale=3, nullable=true)
     */
    private $quantidade;

    /**
     * @var string
     *
     * @ORM\Column(name="custo", type="decimal", precision=10, scale=6, nullable=false)
     */
    private $custo;

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
     * @var \Shopping\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produtoId", referencedColumnName="id")
     * })
     */
    private $produtoid;


}

