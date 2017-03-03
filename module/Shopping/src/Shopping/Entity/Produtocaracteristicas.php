<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produtocaracteristicas
 *
 * @ORM\Table(name="produtocaracteristicas", indexes={@ORM\Index(name="FK_ProdutoCaracteristicas_Caracteristicas", columns={"caracteristicasId"}), @ORM\Index(name="FK_ProdutoCaracteristicas_Produto", columns={"produtoId"})})
 * @ORM\Entity
 */
class Produtocaracteristicas
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
     * @ORM\Column(name="valor", type="string", length=255, nullable=true)
     */
    private $valor;

    /**
     * @var \Shopping\Entity\Caracteristicas
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Caracteristicas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="caracteristicasId", referencedColumnName="id")
     * })
     */
    private $caracteristicasid;

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

