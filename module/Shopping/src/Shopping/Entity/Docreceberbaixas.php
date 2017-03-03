<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docreceberbaixas
 *
 * @ORM\Table(name="docreceberbaixas", indexes={@ORM\Index(name="FK_DocReceberBaixas_ContaCorrente", columns={"contacorrenteId"}), @ORM\Index(name="FK_DocReceberBaixas_DocumentosReceber", columns={"documentosreceberId"})})
 * @ORM\Entity
 */
class Docreceberbaixas
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
     * @ORM\Column(name="valorpago", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valorpago;

    /**
     * @var string
     *
     * @ORM\Column(name="valordesconto", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valordesconto;

    /**
     * @var string
     *
     * @ORM\Column(name="valorabatimento", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valorabatimento;

    /**
     * @var string
     *
     * @ORM\Column(name="valorjuros", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valorjuros;

    /**
     * @var string
     *
     * @ORM\Column(name="valormulta", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valormulta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datapagamento", type="date", nullable=true)
     */
    private $datapagamento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="databaixa", type="date", nullable=true)
     */
    private $databaixa;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipobaixaId", type="integer", nullable=true)
     */
    private $tipobaixaid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datacredito", type="date", nullable=true)
     */
    private $datacredito;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="string", length=100, nullable=true)
     */
    private $observacao;

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
     * @var \Shopping\Entity\Documentosreceber
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Documentosreceber")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="documentosreceberId", referencedColumnName="id")
     * })
     */
    private $documentosreceberid;


}

