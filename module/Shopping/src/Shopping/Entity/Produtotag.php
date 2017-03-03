<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produtotag
 *
 * @ORM\Table(name="produtotag", indexes={@ORM\Index(name="FK_ProdutoTag_Produto", columns={"produtoId"}), @ORM\Index(name="FK_ProdutoTag_TagPesquisa", columns={"tagId"})})
 * @ORM\Entity
 */
class Produtotag
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
     * @var \Shopping\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produtoId", referencedColumnName="id")
     * })
     */
    private $produtoid;

    /**
     * @var \Shopping\Entity\Tagpesquisa
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Tagpesquisa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tagId", referencedColumnName="id")
     * })
     */
    private $tagid;


}

