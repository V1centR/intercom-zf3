<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoanewsletter
 *
 * @ORM\Table(name="pessoanewsletter", indexes={@ORM\Index(name="FK_PessoaNewsletter_Pessoa", columns={"pessoaId"})})
 * @ORM\Entity
 */
class Pessoanewsletter
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
     * @ORM\Column(name="nome", type="string", length=60, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datacadastro", type="datetime", nullable=true)
     */
    private $datacadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataremocao", type="datetime", nullable=true)
     */
    private $dataremocao;

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

