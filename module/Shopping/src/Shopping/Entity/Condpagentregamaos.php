<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condpagentregamaos
 *
 * @ORM\Table(name="condpagentregamaos", indexes={@ORM\Index(name="FK_CondPagEntregaMaos_FormaPagamento", columns={"formapagamentoId"}), @ORM\Index(name="FK_CondPagEntregaMaos_Imagem", columns={"imagemid"})})
 * @ORM\Entity
 */
class Condpagentregamaos
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
     * @ORM\Column(name="textonalojavirtual", type="string", length=50, nullable=true)
     */
    private $textonalojavirtual;

    /**
     * @var string
     *
     * @ORM\Column(name="disponivelLojaVirtual", type="string", length=1, nullable=true)
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
     *   @ORM\JoinColumn(name="imagemid", referencedColumnName="id")
     * })
     */
    private $imagemid;


}

