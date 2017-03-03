<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Banners
 *
 * @ORM\Table(name="banners", indexes={@ORM\Index(name="FK_Banners_Imagem", columns={"imagemId"})})
 * @ORM\Entity
 */
class Banners
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
     * @var integer
     *
     * @ORM\Column(name="tipoURL", type="integer", nullable=false)
     */
    private $tipourl;

    /**
     * @var string
     *
     * @ORM\Column(name="URL", type="string", length=100, nullable=false)
     */
    private $url;

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
     * @return Banners
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Banners
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
     * @return Banners
     */
    public function setCategoriaid($categoriaid)
    {
        $this->categoriaid = $categoriaid;
        return $this;
    }

    /**
     * @return int
     */
    public function getTipourl()
    {
        return $this->tipourl;
    }

    /**
     * @param int $tipourl
     * @return Banners
     */
    public function setTipourl($tipourl)
    {
        $this->tipourl = $tipourl;
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
     * @return Banners
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
     * @return Banners
     */
    public function setImagemid($imagemid)
    {
        $this->imagemid = $imagemid;
        return $this;
    }





}

