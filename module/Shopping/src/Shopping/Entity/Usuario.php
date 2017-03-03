<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
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
     * @ORM\Column(name="empresaId", type="integer", nullable=true)
     */
    private $empresaid;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="sobrenome", type="string", length=80, nullable=true)
     */
    private $sobrenome;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255, nullable=true)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="tipousuario", type="string", length=1, nullable=true)
     */
    private $tipousuario;

    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=20, nullable=true)
     */
    private $telefone;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=20, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="emailalternativo", type="string", length=60, nullable=true)
     */
    private $emailalternativo;

    /**
     * @var string
     *
     * @ORM\Column(name="idredefinirsenha", type="string", length=15, nullable=true)
     */
    private $idredefinirsenha;

    /**
     * @var string
     *
     * @ORM\Column(name="idconfemail", type="string", length=45, nullable=true)
     */
    private $idconfemail;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status = 'A';

    /**
     * @var string
     *
     * @ORM\Column(name="tipofaturamento", type="string", length=15, nullable=true)
     */
    private $tipofaturamento;

    /**
     * @var string
     *
     * @ORM\Column(name="valorcarregamento", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $valorcarregamento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datahoracadastro", type="datetime", nullable=false)
     */
    private $datahoracadastro;


}

