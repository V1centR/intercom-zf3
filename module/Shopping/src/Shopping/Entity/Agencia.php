<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agencia
 *
 * @ORM\Table(name="agencia", indexes={@ORM\Index(name="IXFK_Agencia_Banco", columns={"bancoId"})})
 * @ORM\Entity
 */
class Agencia
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
     * @ORM\Column(name="numero", type="string", length=10, nullable=true)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="digito", type="string", length=1, nullable=true)
     */
    private $digito;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50, nullable=false)
     */
    private $nome;

    /**
     * @var \Shopping\Entity\Banco
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Banco")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bancoId", referencedColumnName="id")
     * })
     */
    private $bancoid;


}

