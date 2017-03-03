<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Campanhaemailmkt
 *
 * @ORM\Table(name="campanhaemailmkt")
 * @ORM\Entity
 */
class Campanhaemailmkt
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
     * @ORM\Column(name="nome", type="string", length=50, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="situacao", type="string", length=1, nullable=false)
     */
    private $situacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datainicio", type="datetime", nullable=true)
     */
    private $datainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datafinal", type="datetime", nullable=true)
     */
    private $datafinal;

    /**
     * @var integer
     *
     * @ORM\Column(name="imagemtopoId", type="integer", nullable=true)
     */
    private $imagemtopoid;

    /**
     * @var integer
     *
     * @ORM\Column(name="imagemrodapeId", type="integer", nullable=true)
     */
    private $imagemrodapeid;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidadeprodutos", type="integer", nullable=true)
     */
    private $quantidadeprodutos;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipoprodutos", type="integer", nullable=true)
     */
    private $tipoprodutos;

    /**
     * @var integer
     *
     * @ORM\Column(name="cupomId", type="integer", nullable=true)
     */
    private $cupomid;


}

