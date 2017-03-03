<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias", indexes={@ORM\Index(name="FK_Categorias_Imagem", columns={"imagemId"})})
 * @ORM\Entity
 */
class Categorias
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
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="categoriaId", type="integer", nullable=true)
     */
    private $categoriaid;

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
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=100, nullable=true)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="imagemcategoriaId", type="integer", nullable=true)
     */
    private $imagemcategoriaid;

    /**
     * @var string
     *
     * @ORM\Column(name="google", type="string", length=1, nullable=false)
     */
    private $google;

    /**
     * @var integer
     *
     * @ORM\Column(name="googletaxonomiaId", type="integer", nullable=false)
     */
    private $googletaxonomiaid;

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

