<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitanteprodutos
 *
 * @ORM\Table(name="visitanteprodutos", indexes={@ORM\Index(name="FK_VisitanteProdutos_Produto", columns={"produtoId"}), @ORM\Index(name="FK_VisitanteProdutos_Visitante", columns={"visitanteId"})})
 * @ORM\Entity
 */
class Visitanteprodutos
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
     * @var integer
     *
     * @ORM\Column(name="visitanteId", type="integer", nullable=true)
     */
    private $visitanteid;

    /**
     * @var integer
     *
     * @ORM\Column(name="produtoId", type="integer", nullable=true)
     */
    private $produtoid;


}

