<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documentosreceber
 *
 * @ORM\Table(name="documentosreceber", indexes={@ORM\Index(name="FK_DocumentosReceber_ContaCorrente", columns={"contacorrenteId"}), @ORM\Index(name="FK_DocumentosReceber_FormaPagamento", columns={"formapagamentoId"}), @ORM\Index(name="FK_DocumentosReceber_Local", columns={"localId"}), @ORM\Index(name="FK_DocumentosReceber_Pedido", columns={"pedidoId"}), @ORM\Index(name="FK_DocumentosReceber_Pessoa", columns={"pessoaId"})})
 * @ORM\Entity
 */
class Documentosreceber
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
     * @ORM\Column(name="numfatura", type="integer", nullable=true)
     */
    private $numfatura;

    /**
     * @var integer
     *
     * @ORM\Column(name="numsequencia", type="integer", nullable=true)
     */
    private $numsequencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="notafiscalId", type="integer", nullable=true)
     */
    private $notafiscalid;

    /**
     * @var integer
     *
     * @ORM\Column(name="contratoId", type="integer", nullable=true)
     */
    private $contratoid;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiporeceitaId", type="integer", nullable=true)
     */
    private $tiporeceitaid;

    /**
     * @var integer
     *
     * @ORM\Column(name="centrocustoId", type="integer", nullable=true)
     */
    private $centrocustoid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataemissao", type="date", nullable=true)
     */
    private $dataemissao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datavencimento", type="date", nullable=true)
     */
    private $datavencimento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataprevpagto", type="date", nullable=true)
     */
    private $dataprevpagto;

    /**
     * @var integer
     *
     * @ORM\Column(name="carteira", type="integer", nullable=true)
     */
    private $carteira;

    /**
     * @var string
     *
     * @ORM\Column(name="numtitulo", type="string", length=20, nullable=true)
     */
    private $numtitulo;

    /**
     * @var string
     *
     * @ORM\Column(name="percjurosmes", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $percjurosmes;

    /**
     * @var string
     *
     * @ORM\Column(name="percmulta", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $percmulta;

    /**
     * @var string
     *
     * @ORM\Column(name="valoremissao", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valoremissao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataimpboleto", type="datetime", nullable=true)
     */
    private $dataimpboleto;

    /**
     * @var integer
     *
     * @ORM\Column(name="documentoagrupammentoId", type="integer", nullable=true)
     */
    private $documentoagrupammentoid;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=false)
     */
    private $status;

    /**
     * @var \Shopping\Entity\Contacorrente
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Contacorrente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contacorrenteId", referencedColumnName="id")
     * })
     */
    private $contacorrenteid;

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
     * @var \Shopping\Entity\Pedido
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedidoId", referencedColumnName="id")
     * })
     */
    private $pedidoid;

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

