<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acessoproduto
 *
 * @ORM\Table(name="acessoproduto", indexes={@ORM\Index(name="FK_AcessoProduto_Produto", columns={"produtoId"})})
 * @ORM\Entity
 */
class Acessoproduto
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
     * @var \DateTime
     *
     * @ORM\Column(name="dataacesso", type="date", nullable=false)
     */
    private $dataacesso;

    /**
     * @var integer
     *
     * @ORM\Column(name="acessos", type="integer", nullable=true)
     */
    private $acessos;

    /**
     * @var \Shopping\Entity\Produto
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produtoId", referencedColumnName="id")
     * })
     */
    private $produtoid;


}

