<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Representante
 *
 * @ORM\Table(name="representante")
 * @ORM\Entity
 */
class Representante
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
     * @ORM\Column(name="ativo", type="string", length=1, nullable=true)
     */
    private $ativo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipocomissao", type="integer", nullable=true)
     */
    private $tipocomissao;

    /**
     * @var string
     *
     * @ORM\Column(name="percentualcomissao", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $percentualcomissao;

    /**
     * @var string
     *
     * @ORM\Column(name="formarecebimentocomissao", type="string", length=1, nullable=true)
     */
    private $formarecebimentocomissao;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuarioId", type="integer", nullable=true)
     */
    private $usuarioid;


}

