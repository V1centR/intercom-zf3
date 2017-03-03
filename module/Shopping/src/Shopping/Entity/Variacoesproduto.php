<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Variacoesproduto
 *
 * @ORM\Table(name="variacoesproduto", indexes={@ORM\Index(name="FK_VariacoesProduto_Produto", columns={"produtoId"}), @ORM\Index(name="FK_VariacoesProduto_Variacao", columns={"variacaoId"})})
 * @ORM\Entity
 */
class Variacoesproduto
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
     * @var \Shopping\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produtoId", referencedColumnName="id")
     * })
     */
    private $produtoid;

    /**
     * @var \Shopping\Entity\Variacao
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Variacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="variacaoId", referencedColumnName="id")
     * })
     */
    private $variacaoid;


}

