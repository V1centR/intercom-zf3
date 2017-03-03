<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pessoa
 *
 * @ORM\Table(name="pessoa")
 * @ORM\Entity
 */
class Pessoa
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
     * @ORM\Column(name="tipocadastro", type="integer", nullable=true)
     */
    private $tipocadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="razaosocial", type="string", length=60, nullable=true)
     */
    private $razaosocial;

    /**
     * @var string
     *
     * @ORM\Column(name="nomefantasia", type="string", length=50, nullable=true)
     */
    private $nomefantasia;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=60, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="emaildanfe", type="string", length=60, nullable=true)
     */
    private $emaildanfe;

    /**
     * @var string
     *
     * @ORM\Column(name="telcomercial", type="string", length=20, nullable=true)
     */
    private $telcomercial;

    /**
     * @var string
     *
     * @ORM\Column(name="ramal", type="string", length=5, nullable=true)
     */
    private $ramal;

    /**
     * @var string
     *
     * @ORM\Column(name="telresidencial", type="string", length=20, nullable=true)
     */
    private $telresidencial;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=20, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=20, nullable=true)
     */
    private $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpjcpf", type="string", length=20, nullable=true)
     */
    private $cnpjcpf;

    /**
     * @var string
     *
     * @ORM\Column(name="rg", type="string", length=20, nullable=true)
     */
    private $rg;

    /**
     * @var string
     *
     * @ORM\Column(name="inscestadual", type="string", length=20, nullable=true)
     */
    private $inscestadual;

    /**
     * @var string
     *
     * @ORM\Column(name="inscsuframa", type="string", length=20, nullable=true)
     */
    private $inscsuframa;

    /**
     * @var string
     *
     * @ORM\Column(name="responsavel", type="string", length=50, nullable=true)
     */
    private $responsavel;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=true)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datanascimento", type="date", nullable=true)
     */
    private $datanascimento;

    /**
     * @var integer
     *
     * @ORM\Column(name="transportadora", type="integer", nullable=true)
     */
    private $transportadora;

    /**
     * @var integer
     *
     * @ORM\Column(name="tabeladeprecos", type="integer", nullable=true)
     */
    private $tabeladeprecos;

    /**
     * @var string
     *
     * @ORM\Column(name="newsletters", type="string", length=1, nullable=true)
     */
    private $newsletters;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=255, nullable=true)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="idconfemail", type="string", length=255, nullable=false)
     */
    private $idconfemail;

    /**
     * @var string
     *
     * @ORM\Column(name="emailcobranca", type="string", length=100, nullable=false)
     */
    private $emailcobranca;


}

