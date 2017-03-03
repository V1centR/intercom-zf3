<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condpagbradesco
 *
 * @ORM\Table(name="condpagbradesco", indexes={@ORM\Index(name="FK_CondPagBradesco_FormaPagamento", columns={"formapagamentoId"}), @ORM\Index(name="FK_CondPagBradesco_Imagem", columns={"imagemId"})})
 * @ORM\Entity
 */
class Condpagbradesco
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
     * @ORM\Column(name="ativo", type="string", length=1, nullable=true)
     */
    private $ativo;

    /**
     * @var string
     *
     * @ORM\Column(name="textolojavirtual", type="string", length=50, nullable=true)
     */
    private $textolojavirtual;

    /**
     * @var string
     *
     * @ORM\Column(name="disponivellojavirtual", type="string", length=1, nullable=true)
     */
    private $disponivellojavirtual;

    /**
     * @var integer
     *
     * @ORM\Column(name="contacorrenteId", type="integer", nullable=true)
     */
    private $contacorrenteid;

    /**
     * @var string
     *
     * @ORM\Column(name="adicionarsubtrair", type="string", length=1, nullable=true)
     */
    private $adicionarsubtrair;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="aceitaboleto", type="string", length=1, nullable=true)
     */
    private $aceitaboleto;

    /**
     * @var string
     *
     * @ORM\Column(name="aceitadebito", type="string", length=1, nullable=true)
     */
    private $aceitadebito;

    /**
     * @var string
     *
     * @ORM\Column(name="aceitafinanciamento", type="string", length=1, nullable=true)
     */
    private $aceitafinanciamento;

    /**
     * @var string
     *
     * @ORM\Column(name="aceitacartao", type="string", length=1, nullable=true)
     */
    private $aceitacartao;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroloja", type="string", length=50, nullable=true)
     */
    private $numeroloja;

    /**
     * @var string
     *
     * @ORM\Column(name="assinaturadigitalcontas", type="string", length=50, nullable=true)
     */
    private $assinaturadigitalcontas;

    /**
     * @var string
     *
     * @ORM\Column(name="assinaturadigitalboleto", type="string", length=50, nullable=true)
     */
    private $assinaturadigitalboleto;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="diasvenctoboleto", type="integer", nullable=true)
     */
    private $diasvenctoboleto;

    /**
     * @var string
     *
     * @ORM\Column(name="obsboleto", type="string", length=255, nullable=true)
     */
    private $obsboleto;

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
     * @var \Shopping\Entity\Formapagamento
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Formapagamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formapagamentoId", referencedColumnName="id")
     * })
     */
    private $formapagamentoid;

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

