<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atendimento
 *
 * @ORM\Table(name="atendimento", indexes={@ORM\Index(name="FK_Atendimento_Pedido", columns={"pedidoId"}), @ORM\Index(name="FK_Atendimento_Pessoa", columns={"pessoaId"})})
 * @ORM\Entity
 */
class Atendimento
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
     * @ORM\Column(name="tiposolicitacao", type="integer", nullable=true)
     */
    private $tiposolicitacao;

    /**
     * @var string
     *
     * @ORM\Column(name="assunto", type="string", length=50, nullable=true)
     */
    private $assunto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datahora", type="datetime", nullable=true)
     */
    private $datahora;

    /**
     * @var string
     *
     * @ORM\Column(name="produtos", type="string", length=50, nullable=true)
     */
    private $produtos;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="string", length=255, nullable=true)
     */
    private $texto;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=20, nullable=false)
     */
    private $telefone;

    /**
     * @var \Shopping\Entity\Pedido
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pedidoId", referencedColumnName="id")
     * })
     */
    private $pedidoid;

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

