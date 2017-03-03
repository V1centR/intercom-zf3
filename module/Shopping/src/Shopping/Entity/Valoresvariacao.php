<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Valoresvariacao
 *
 * @ORM\Table(name="valoresvariacao", indexes={@ORM\Index(name="FK_ValoresVariacao_VariacaoPropriedade", columns={"variacaopropriedadeId"}), @ORM\Index(name="FK_ValorPropriedade_Imagem", columns={"imagemId"}), @ORM\Index(name="FK_ValorPropriedade_Produto", columns={"produtoId"})})
 * @ORM\Entity
 */
class Valoresvariacao
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
     * @ORM\Column(name="valorunitario", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valorunitario;

    /**
     * @var string
     *
     * @ORM\Column(name="valorpromocional", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valorpromocional;

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="decimal", precision=8, scale=3, nullable=true)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="quantidade", type="decimal", precision=10, scale=3, nullable=true)
     */
    private $quantidade;

    /**
     * @var integer
     *
     * @ORM\Column(name="comprimento", type="integer", nullable=true)
     */
    private $comprimento;

    /**
     * @var integer
     *
     * @ORM\Column(name="largura", type="integer", nullable=true)
     */
    private $largura;

    /**
     * @var integer
     *
     * @ORM\Column(name="altura", type="integer", nullable=true)
     */
    private $altura;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=50, nullable=true)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="exibir", type="string", length=1, nullable=true)
     */
    private $exibir;

    /**
     * @var string
     *
     * @ORM\Column(name="percdesconto", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $percdesconto;

    /**
     * @var \Shopping\Entity\Imagem
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Imagem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imagemId", referencedColumnName="id")
     * })
     */
    private $imagemid;

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
     * @var \Shopping\Entity\Variacaopropriedade
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Variacaopropriedade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="variacaopropriedadeId", referencedColumnName="id")
     * })
     */
    private $variacaopropriedadeid;


}

