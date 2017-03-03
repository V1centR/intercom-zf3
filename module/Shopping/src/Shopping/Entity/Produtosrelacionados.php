<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produtosrelacionados
 *
 * @ORM\Table(name="produtosrelacionados", indexes={@ORM\Index(name="FK_ProdutosRelacionados_Produto", columns={"produtoId"}), @ORM\Index(name="FK_ProdutosRelacionados_Produto_02", columns={"produtorelacionadoId"})})
 * @ORM\Entity
 */
class Produtosrelacionados
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
     * @ORM\Column(name="tiporelacionamento", type="string", length=1, nullable=true)
     */
    private $tiporelacionamento;

    /**
     * @var string
     *
     * @ORM\Column(name="descontocomprejunto", type="string", length=1, nullable=true)
     */
    private $descontocomprejunto;

    /**
     * @var string
     *
     * @ORM\Column(name="valorcomprejunto", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valorcomprejunto;

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
     * @var \Shopping\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produtorelacionadoId", referencedColumnName="id")
     * })
     */
    private $produtorelacionadoid;


}

