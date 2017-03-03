<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", indexes={@ORM\Index(name="FK_Pedidos_Endereco", columns={"enderecocobId"}), @ORM\Index(name="FK_Pedidos_Endereco_02", columns={"enderecoentId"}), @ORM\Index(name="FK_Pedidos_FormaPagamento", columns={"formapagamentoId"}), @ORM\Index(name="FK_Pedidos_Local", columns={"localId"}), @ORM\Index(name="FK_Pedidos_Pessoa", columns={"pessoaId"})})
 * @ORM\Entity
 */
class Pedido
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
     * @ORM\Column(name="numeropedido", type="integer", nullable=true)
     */
    private $numeropedido;

    /**
     * @var integer
     *
     * @ORM\Column(name="carrinhoId", type="integer", nullable=true)
     */
    private $carrinhoid;

    /**
     * @var integer
     *
     * @ORM\Column(name="statusId", type="integer", nullable=true)
     */
    private $statusid;

    /**
     * @var integer
     *
     * @ORM\Column(name="freteId", type="integer", nullable=true)
     */
    private $freteid;

    /**
     * @var string
     *
     * @ORM\Column(name="valordesconto", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valordesconto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datapedido", type="datetime", nullable=true)
     */
    private $datapedido;

    /**
     * @var string
     *
     * @ORM\Column(name="observacoes", type="string", length=255, nullable=true)
     */
    private $observacoes;

    /**
     * @var string
     *
     * @ORM\Column(name="valorfrete", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valorfrete;

    /**
     * @var string
     *
     * @ORM\Column(name="valortotal", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valortotal;

    /**
     * @var string
     *
     * @ORM\Column(name="localizador", type="string", length=50, nullable=true)
     */
    private $localizador;

    /**
     * @var \Shopping\Entity\Endereco
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="enderecocobId", referencedColumnName="id")
     * })
     */
    private $enderecocobid;

    /**
     * @var \Shopping\Entity\Endereco
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Endereco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="enderecoentId", referencedColumnName="id")
     * })
     */
    private $enderecoentid;

    /**
     * @var \Shopping\Entity\Formapagamento
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Formapagamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formapagamentoId", referencedColumnName="id")
     * })
     */
    private $formapagamentoid;

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
     * @var \Shopping\Entity\Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pessoaId", referencedColumnName="id")
     * })
     */
    private $pessoaid;


}

