<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidoitens
 *
 * @ORM\Table(name="pedidoitens", indexes={@ORM\Index(name="FK_PedidoItens_Pedidos", columns={"pedidoId"}), @ORM\Index(name="FK_PedidoItens_Produto", columns={"produtoId"})})
 * @ORM\Entity
 */
class Pedidoitens
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
     * @var integer
     *
     * @ORM\Column(name="item", type="integer", nullable=true)
     */
    private $item;

    /**
     * @var string
     *
     * @ORM\Column(name="quantidade", type="decimal", precision=8, scale=3, nullable=true)
     */
    private $quantidade;

    /**
     * @var string
     *
     * @ORM\Column(name="precounitario", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $precounitario;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="string", length=255, nullable=true)
     */
    private $observacao;

    /**
     * @var \Shopping\Entity\Pedido
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedidoId", referencedColumnName="id")
     * })
     */
    private $pedidoid;

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

