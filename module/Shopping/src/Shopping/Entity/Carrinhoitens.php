<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carrinhoitens
 *
 * @ORM\Table(name="carrinhoitens", indexes={@ORM\Index(name="FK_CarrinhoItens_Carrinho", columns={"carrinhoId"}), @ORM\Index(name="FK_CarrinhoItens_Produto", columns={"produtoId"}), @ORM\Index(name="FK_CarrinhoItens_ValoresVariacao", columns={"variacaoId"})})
 * @ORM\Entity
 */
class Carrinhoitens
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
     * @ORM\Column(name="quantidade", type="decimal", precision=8, scale=3, nullable=true)
     */
    private $quantidade;

    /**
     * @var \Shopping\Entity\Carrinho
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Carrinho")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="carrinhoId", referencedColumnName="id")
     * })
     */
    private $carrinhoid;

    /**
     * @var \Shopping\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produtoId", referencedColumnName="id")
     * })
     */
    private $produtoid;

    /**
     * @var \Shopping\Entity\Valoresvariacao
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Valoresvariacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="variacaoId", referencedColumnName="id")
     * })
     */
    private $variacaoid;


}

