<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Precos
 *
 * @ORM\Table(name="precos", indexes={@ORM\Index(name="FK_Precos_Produto", columns={"produtoId"}), @ORM\Index(name="FK_Precos_TabelaPrecos", columns={"tabelaprecoId"})})
 * @ORM\Entity
 */
class Precos
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
     * @ORM\Column(name="precounitario", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $precounitario;

    /**
     * @var string
     *
     * @ORM\Column(name="promocao", type="string", length=1, nullable=true)
     */
    private $promocao;

    /**
     * @var string
     *
     * @ORM\Column(name="precopromocional", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $precopromocional;

    /**
     * @var string
     *
     * @ORM\Column(name="percdesconto", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $percdesconto;

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
     * @var \Shopping\Entity\Tabelaprecos
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Tabelaprecos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tabelaprecoId", referencedColumnName="id")
     * })
     */
    private $tabelaprecoid;


}

