<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produtofrete
 *
 * @ORM\Table(name="produtofrete", indexes={@ORM\Index(name="FK_ProdutoFrete_Frete", columns={"freteId"}), @ORM\Index(name="FK_ProdutoFrete_Produto", columns={"produtoId"})})
 * @ORM\Entity
 */
class Produtofrete
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
     * @var \Shopping\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produtoId", referencedColumnName="id")
     * })
     */
    private $produtoid;


}

