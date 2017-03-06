<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorias
 *
 * @ORM\Table(name="categorias", indexes={@ORM\Index(name="FK_Categorias_Imagem", columns={"imagemId"})})
 * @ORM\Entity(repositoryClass="Shopping\Repository\CategoriasRepository")
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Categorias
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Categorias
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Categorias
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoriaid()
    {
        return $this->categoriaid;
    }

    /**
     * @param int $categoriaid
     * @return Categorias
     */
    public function setCategoriaid($categoriaid)
    {
        $this->categoriaid = $categoriaid;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeo()
    {
        return $this->seo;
    }

    /**
     * @param string $seo
     * @return Categorias
     */
    public function setSeo($seo)
    {
        $this->seo = $seo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescseo()
    {
        return $this->descseo;
    }

    /**
     * @param string $descseo
     * @return Categorias
     */
    public function setDescseo($descseo)
    {
        $this->descseo = $descseo;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Categorias
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return int
     */
    public function getImagemcategoriaid()
    {
        return $this->imagemcategoriaid;
    }

    /**
     * @param int $imagemcategoriaid
     * @return Categorias
     */
    public function setImagemcategoriaid($imagemcategoriaid)
    {
        $this->imagemcategoriaid = $imagemcategoriaid;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoogle()
    {
        return $this->google;
    }

    /**
     * @param string $google
     * @return Categorias
     */
    public function setGoogle($google)
    {
        $this->google = $google;
        return $this;
    }

    /**
     * @return int
     */
    public function getGoogletaxonomiaid()
    {
        return $this->googletaxonomiaid;
    }

    /**
     * @param int $googletaxonomiaid
     * @return Categorias
     */
    public function setGoogletaxonomiaid($googletaxonomiaid)
    {
        $this->googletaxonomiaid = $googletaxonomiaid;
        return $this;
    }

    /**
     * @return Imagem
     */
    public function getImagemid()
    {
        return $this->imagemid;
    }

    /**
     * @param Imagem $imagemid
     * @return Categorias
     */
    public function setImagemid($imagemid)
    {
        $this->imagemid = $imagemid;
        return $this;
    }
}

