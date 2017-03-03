<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracoes
 *
 * @ORM\Table(name="configuracoes")
 * @ORM\Entity
 */
class Configuracoes
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
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube", type="string", length=255, nullable=true)
     */
    private $youtube;

    /**
     * @var string
     *
     * @ORM\Column(name="delicious", type="string", length=255, nullable=true)
     */
    private $delicious;

    /**
     * @var string
     *
     * @ORM\Column(name="google", type="string", length=255, nullable=true)
     */
    private $google;

    /**
     * @var string
     *
     * @ORM\Column(name="instagram", type="string", length=255, nullable=true)
     */
    private $instagram;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="nProdutoInicial", type="integer", nullable=true)
     */
    private $nprodutoinicial;

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="string", length=150, nullable=true)
     */
    private $slogan;

    /**
     * @var integer
     *
     * @ORM\Column(name="colunas", type="integer", nullable=true)
     */
    private $colunas;

    /**
     * @var string
     *
     * @ORM\Column(name="copyright", type="string", length=255, nullable=true)
     */
    private $copyright;

    /**
     * @var string
     *
     * @ORM\Column(name="infoRodape", type="text", length=65535, nullable=true)
     */
    private $inforodape;

    /**
     * @var string
     *
     * @ORM\Column(name="seo", type="text", length=65535, nullable=true)
     */
    private $seo;

    /**
     * @var string
     *
     * @ORM\Column(name="descSeo", type="text", length=65535, nullable=true)
     */
    private $descseo;

    /**
     * @var integer
     *
     * @ORM\Column(name="template", type="integer", nullable=false)
     */
    private $template;

    /**
     * @var integer
     *
     * @ORM\Column(name="logoId", type="integer", nullable=false)
     */
    private $logoid;

    /**
     * @var string
     *
     * @ORM\Column(name="mensagematendimento", type="string", length=255, nullable=false)
     */
    private $mensagematendimento;

    /**
     * @var string
     *
     * @ORM\Column(name="telefoneatendimento", type="string", length=50, nullable=false)
     */
    private $telefoneatendimento;

    /**
     * @var string
     *
     * @ORM\Column(name="googleanalytics", type="string", length=50, nullable=false)
     */
    private $googleanalytics;

    /**
     * @var string
     *
     * @ORM\Column(name="bing", type="string", length=50, nullable=false)
     */
    private $bing;

    /**
     * @var string
     *
     * @ORM\Column(name="pinterest", type="string", length=50, nullable=false)
     */
    private $pinterest;

    /**
     * @var string
     *
     * @ORM\Column(name="ebitcodigo", type="string", length=50, nullable=false)
     */
    private $ebitcodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ebiturl", type="string", length=50, nullable=false)
     */
    private $ebiturl;

    /**
     * @var string
     *
     * @ORM\Column(name="usuarioftpgoogle", type="string", length=50, nullable=false)
     */
    private $usuarioftpgoogle;

    /**
     * @var string
     *
     * @ORM\Column(name="senhaftpgoogle", type="string", length=50, nullable=false)
     */
    private $senhaftpgoogle;

    /**
     * @var string
     *
     * @ORM\Column(name="urlsite", type="string", length=100, nullable=false)
     */
    private $urlsite;


}

