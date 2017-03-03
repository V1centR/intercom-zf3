<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condpagboleto
 *
 * @ORM\Table(name="condpagboleto", indexes={@ORM\Index(name="FK_CondPagBoleto_Imagem", columns={"imagemId"})})
 * @ORM\Entity
 */
class Condpagboleto
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
     * @ORM\Column(name="formapagamentoId", type="integer", nullable=true)
     */
    private $formapagamentoid;

    /**
     * @var integer
     *
     * @ORM\Column(name="contacorrenteId", type="integer", nullable=true)
     */
    private $contacorrenteid;

    /**
     * @var string
     *
     * @ORM\Column(name="ativo", type="string", length=1, nullable=true)
     */
    private $ativo;

    /**
     * @var string
     *
     * @ORM\Column(name="disponivelLojaVirtual", type="string", length=1, nullable=true)
     */
    private $disponivellojavirtual;

    /**
     * @var string
     *
     * @ORM\Column(name="carteira", type="string", length=3, nullable=true)
     */
    private $carteira;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoconvenio", type="string", length=50, nullable=true)
     */
    private $codigoconvenio;

    /**
     * @var string
     *
     * @ORM\Column(name="percentualdesconto", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $percentualdesconto;

    /**
     * @var string
     *
     * @ORM\Column(name="obstipopagto", type="string", length=255, nullable=true)
     */
    private $obstipopagto;

    /**
     * @var string
     *
     * @ORM\Column(name="obspedido", type="string", length=255, nullable=true)
     */
    private $obspedido;

    /**
     * @var \Shopping\Entity\Imagem
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Imagem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imagemId", referencedColumnName="id")
     * })
     */
    private $imagemid;


}

