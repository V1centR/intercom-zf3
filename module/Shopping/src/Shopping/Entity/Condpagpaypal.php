<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condpagpaypal
 *
 * @ORM\Table(name="condpagpaypal", indexes={@ORM\Index(name="FK_CondPagPaypal_FormaPagamento", columns={"formapagamentoId"}), @ORM\Index(name="FK_CondPagPaypal_Imagem", columns={"imagemId"})})
 * @ORM\Entity
 */
class Condpagpaypal
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
     * @ORM\Column(name="nomeusuariointerface", type="string", length=50, nullable=true)
     */
    private $nomeusuariointerface;

    /**
     * @var string
     *
     * @ORM\Column(name="senhainterface", type="string", length=50, nullable=true)
     */
    private $senhainterface;

    /**
     * @var string
     *
     * @ORM\Column(name="assinatura", type="string", length=50, nullable=true)
     */
    private $assinatura;

    /**
     * @var string
     *
     * @ORM\Column(name="moeda", type="string", length=2, nullable=true)
     */
    private $moeda;

    /**
     * @var string
     *
     * @ORM\Column(name="valormoeda", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valormoeda;

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

