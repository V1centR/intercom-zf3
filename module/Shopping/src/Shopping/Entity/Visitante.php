<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitante
 *
 * @ORM\Table(name="visitante", indexes={@ORM\Index(name="FK_Visitante_Pessoa", columns={"pessoaId"})})
 * @ORM\Entity
 */
class Visitante
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
     * @ORM\Column(name="datahora", type="datetime", nullable=true)
     */
    private $datahora;

    /**
     * @var string
     *
     * @ORM\Column(name="sessao", type="string", length=255, nullable=true)
     */
    private $sessao;

    /**
     * @var string
     *
     * @ORM\Column(name="ipacesso", type="string", length=50, nullable=true)
     */
    private $ipacesso;

    /**
     * @var string
     *
     * @ORM\Column(name="localizacao", type="string", length=50, nullable=true)
     */
    private $localizacao;

    /**
     * @var string
     *
     * @ORM\Column(name="campanha", type="string", length=50, nullable=true)
     */
    private $campanha;

    /**
     * @var string
     *
     * @ORM\Column(name="origem", type="string", length=50, nullable=true)
     */
    private $origem;

    /**
     * @var integer
     *
     * @ORM\Column(name="parceiroId", type="integer", nullable=true)
     */
    private $parceiroid;

    /**
     * @var \Shopping\Entity\Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pessoaId", referencedColumnName="id")
     * })
     */
    private $pessoaid;


}

