<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Precos
 *
 * @ORM\Table(name="precos", indexes={@ORM\Index(name="FK_Precos_Produto", columns={"produtoId"}), @ORM\Index(name="FK_Precos_TabelaPrecos", columns={"tabelaprecoId"})})
 * @ORM\Entity
 */
class Precos
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
     * @ORM\Column(name="precounitario", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $precounitario;

    /**
     * @var string
     *
     * @ORM\Column(name="promocao", type="string", length=1, nullable=true)
     */
    private $promocao;

    /**
     * @var string
     *
     * @ORM\Column(name="precopromocional", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $precopromocional;

    /**
     * @var string
     *
     * @ORM\Column(name="percdesconto", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $percdesconto;

    /**
     * @var \Shopping\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produtoId", referencedColumnName="id")
     * })
     */
    private $produtoid;

    /**
     * @var \Shopping\Entity\Tabelaprecos
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Tabelaprecos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tabelaprecoId", referencedColumnName="id")
     * })
     */
    private $tabelaprecoid;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Precos
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrecounitario()
    {
        return $this->precounitario;
    }

    /**
     * @param string $precounitario
     * @return Precos
     */
    public function setPrecounitario($precounitario)
    {
        $this->precounitario = $precounitario;
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
     * @return Precos
     */
    public function setPromocao($promocao)
    {
        $this->promocao = $promocao;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrecopromocional()
    {
        return $this->precopromocional;
    }

    /**
     * @param string $precopromocional
     * @return Precos
     */
    public function setPrecopromocional($precopromocional)
    {
        $this->precopromocional = $precopromocional;
        return $this;
    }

    /**
     * @return string
     */
    public function getPercdesconto()
    {
        return $this->percdesconto;
    }

    /**
     * @param string $percdesconto
     * @return Precos
     */
    public function setPercdesconto($percdesconto)
    {
        $this->percdesconto = $percdesconto;
        return $this;
    }

    /**
     * @return Produto
     */
    public function getProdutoid()
    {
        return $this->produtoid;
    }

    /**
     * @param Produto $produtoid
     * @return Precos
     */
    public function setProdutoid($produtoid)
    {
        $this->produtoid = $produtoid;
        return $this;
    }

    /**
     * @return Tabelaprecos
     */
    public function getTabelaprecoid()
    {
        return $this->tabelaprecoid;
    }

    /**
     * @param Tabelaprecos $tabelaprecoid
     * @return Precos
     */
    public function setTabelaprecoid($tabelaprecoid)
    {
        $this->tabelaprecoid = $tabelaprecoid;
        return $this;
    }
}

