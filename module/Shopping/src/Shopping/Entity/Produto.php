<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 *
 * @ORM\Table(name="produto", indexes={@ORM\Index(name="FK_Produto_Categorias", columns={"categoriaId"}), @ORM\Index(name="FK_Produto_Marca", columns={"marca"}), @ORM\Index(name="FK_Produto_OrigemProduto", columns={"origemprodutoId"}), @ORM\Index(name="FK_Produto_Unidade", columns={"unidadeId"})})
 * @ORM\Entity
 */
class Produto
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
     * @ORM\Column(name="nome", type="string", length=200, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", length=65535, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="videoURL", type="string", length=255, nullable=true)
     */
    private $videourl;

    /**
     * @var string
     *
     * @ORM\Column(name="seo", type="string", length=255, nullable=true)
     */
    private $seo;

    /**
     * @var string
     *
     * @ORM\Column(name="descSeo", type="string", length=255, nullable=true)
     */
    private $descseo;

    /**
     * @var string
     *
     * @ORM\Column(name="especificacao", type="text", length=65535, nullable=true)
     */
    private $especificacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datacadastro", type="date", nullable=true)
     */
    private $datacadastro;

    /**
     * @var integer
     *
     * @ORM\Column(name="curtir", type="integer", nullable=true)
     */
    private $curtir;

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="decimal", precision=8, scale=3, nullable=true)
     */
    private $peso;

    /**
     * @var integer
     *
     * @ORM\Column(name="comprimento", type="integer", nullable=true)
     */
    private $comprimento;

    /**
     * @var integer
     *
     * @ORM\Column(name="largura", type="integer", nullable=true)
     */
    private $largura;

    /**
     * @var integer
     *
     * @ORM\Column(name="altura", type="integer", nullable=true)
     */
    private $altura;

    /**
     * @var string
     *
     * @ORM\Column(name="promocao", type="string", length=1, nullable=true)
     */
    private $promocao;

    /**
     * @var string
     *
     * @ORM\Column(name="comvariacao", type="string", length=1, nullable=true)
     */
    private $comvariacao;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordem", type="integer", nullable=true)
     */
    private $ordem;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=45, nullable=true)
     */
    private $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="controlaestoque", type="string", length=1, nullable=true)
     */
    private $controlaestoque;

    /**
     * @var string
     *
     * @ORM\Column(name="avisoabaixodominimo", type="string", length=1, nullable=true)
     */
    private $avisoabaixodominimo;

    /**
     * @var string
     *
     * @ORM\Column(name="quantidademinima", type="decimal", precision=8, scale=3, nullable=true)
     */
    private $quantidademinima;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=250, nullable=true)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="metatitle", type="string", length=200, nullable=true)
     */
    private $metatitle;

    /**
     * @var string
     *
     * @ORM\Column(name="URL", type="string", length=100, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="GTIN", type="string", length=50, nullable=true)
     */
    private $gtin;

    /**
     * @var string
     *
     * @ORM\Column(name="codigofabricante", type="string", length=50, nullable=true)
     */
    private $codigofabricante;

    /**
     * @var string
     *
     * @ORM\Column(name="formasdepagamento", type="string", length=99, nullable=true)
     */
    private $formasdepagamento;

    /**
     * @var \Shopping\Entity\Categorias
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoriaId", referencedColumnName="id")
     * })
     */
    private $categoriaid;

    /**
     * @var \Shopping\Entity\Marca
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Marca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="marca", referencedColumnName="id")
     * })
     */
    private $marca;

    /**
     * @var \Shopping\Entity\Origemproduto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Origemproduto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="origemprodutoId", referencedColumnName="id")
     * })
     */
    private $origemprodutoid;

    /**
     * @var \Shopping\Entity\Unidade
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Unidade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidadeId", referencedColumnName="id")
     * })
     */
    private $unidadeid;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Produto
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
     * @return Produto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     * @return Produto
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
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
     * @return Produto
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideourl()
    {
        return $this->videourl;
    }

    /**
     * @param string $videourl
     * @return Produto
     */
    public function setVideourl($videourl)
    {
        $this->videourl = $videourl;
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
     * @return Produto
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
     * @return Produto
     */
    public function setDescseo($descseo)
    {
        $this->descseo = $descseo;
        return $this;
    }

    /**
     * @return string
     */
    public function getEspecificacao()
    {
        return $this->especificacao;
    }

    /**
     * @param string $especificacao
     * @return Produto
     */
    public function setEspecificacao($especificacao)
    {
        $this->especificacao = $especificacao;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatacadastro()
    {
        return $this->datacadastro;
    }

    /**
     * @param \DateTime $datacadastro
     * @return Produto
     */
    public function setDatacadastro($datacadastro)
    {
        $this->datacadastro = $datacadastro;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurtir()
    {
        return $this->curtir;
    }

    /**
     * @param int $curtir
     * @return Produto
     */
    public function setCurtir($curtir)
    {
        $this->curtir = $curtir;
        return $this;
    }

    /**
     * @return string
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param string $peso
     * @return Produto
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
        return $this;
    }

    /**
     * @return int
     */
    public function getComprimento()
    {
        return $this->comprimento;
    }

    /**
     * @param int $comprimento
     * @return Produto
     */
    public function setComprimento($comprimento)
    {
        $this->comprimento = $comprimento;
        return $this;
    }

    /**
     * @return int
     */
    public function getLargura()
    {
        return $this->largura;
    }

    /**
     * @param int $largura
     * @return Produto
     */
    public function setLargura($largura)
    {
        $this->largura = $largura;
        return $this;
    }

    /**
     * @return int
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @param int $altura
     * @return Produto
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
        return $this;
    }

    /**
     * @return string
     */
    public function getPromocao()
    {
        return $this->promocao;
    }

    /**
     * @param string $promocao
     * @return Produto
     */
    public function setPromocao($promocao)
    {
        $this->promocao = $promocao;
        return $this;
    }

    /**
     * @return string
     */
    public function getComvariacao()
    {
        return $this->comvariacao;
    }

    /**
     * @param string $comvariacao
     * @return Produto
     */
    public function setComvariacao($comvariacao)
    {
        $this->comvariacao = $comvariacao;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * @param int $ordem
     * @return Produto
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
        return $this;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return Produto
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getControlaestoque()
    {
        return $this->controlaestoque;
    }

    /**
     * @param string $controlaestoque
     * @return Produto
     */
    public function setControlaestoque($controlaestoque)
    {
        $this->controlaestoque = $controlaestoque;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvisoabaixodominimo()
    {
        return $this->avisoabaixodominimo;
    }

    /**
     * @param string $avisoabaixodominimo
     * @return Produto
     */
    public function setAvisoabaixodominimo($avisoabaixodominimo)
    {
        $this->avisoabaixodominimo = $avisoabaixodominimo;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuantidademinima()
    {
        return $this->quantidademinima;
    }

    /**
     * @param string $quantidademinima
     * @return Produto
     */
    public function setQuantidademinima($quantidademinima)
    {
        $this->quantidademinima = $quantidademinima;
        return $this;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     * @return Produto
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetatitle()
    {
        return $this->metatitle;
    }

    /**
     * @param string $metatitle
     * @return Produto
     */
    public function setMetatitle($metatitle)
    {
        $this->metatitle = $metatitle;
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
     * @return Produto
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * @param string $gtin
     * @return Produto
     */
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodigofabricante()
    {
        return $this->codigofabricante;
    }

    /**
     * @param string $codigofabricante
     * @return Produto
     */
    public function setCodigofabricante($codigofabricante)
    {
        $this->codigofabricante = $codigofabricante;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormasdepagamento()
    {
        return $this->formasdepagamento;
    }

    /**
     * @param string $formasdepagamento
     * @return Produto
     */
    public function setFormasdepagamento($formasdepagamento)
    {
        $this->formasdepagamento = $formasdepagamento;
        return $this;
    }

    /**
     * @return Categorias
     */
    public function getCategoriaid()
    {
        return $this->categoriaid;
    }

    /**
     * @param Categorias $categoriaid
     * @return Produto
     */
    public function setCategoriaid($categoriaid)
    {
        $this->categoriaid = $categoriaid;
        return $this;
    }

    /**
     * @return Marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param Marca $marca
     * @return Produto
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * @return Origemproduto
     */
    public function getOrigemprodutoid()
    {
        return $this->origemprodutoid;
    }

    /**
     * @param Origemproduto $origemprodutoid
     * @return Produto
     */
    public function setOrigemprodutoid($origemprodutoid)
    {
        $this->origemprodutoid = $origemprodutoid;
        return $this;
    }

    /**
     * @return Unidade
     */
    public function getUnidadeid()
    {
        return $this->unidadeid;
    }

    /**
     * @param Unidade $unidadeid
     * @return Produto
     */
    public function setUnidadeid($unidadeid)
    {
        $this->unidadeid = $unidadeid;
        return $this;
    }



}

