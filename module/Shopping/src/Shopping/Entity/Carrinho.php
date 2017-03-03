<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carrinho
 *
 * @ORM\Table(name="carrinho", indexes={@ORM\Index(name="FK_Carrinho_Visitante", columns={"visitanteId"})})
 * @ORM\Entity
 */
class Carrinho
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
     * @var \DateTime
     *
     * @ORM\Column(name="datahora", type="datetime", nullable=true)
     */
    private $datahora;

    /**
     * @var integer
     *
     * @ORM\Column(name="freteId", type="integer", nullable=true)
     */
    private $freteid;

    /**
     * @var string
     *
     * @ORM\Column(name="etapa", type="string", length=1, nullable=true)
     */
    private $etapa;

    /**
     * @var integer
     *
     * @ORM\Column(name="enderecoId", type="integer", nullable=true)
     */
    private $enderecoid;

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", length=9, nullable=true)
     */
    private $cep;


}

