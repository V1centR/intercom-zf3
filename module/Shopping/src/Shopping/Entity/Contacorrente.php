<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacorrente
 *
 * @ORM\Table(name="contacorrente", indexes={@ORM\Index(name="FK_ContaCorrente_Agencia", columns={"agenciaId"})})
 * @ORM\Entity
 */
class Contacorrente
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
     * @ORM\Column(name="digito", type="string", length=2, nullable=false)
     */
    private $digito;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="ativo", type="string", length=1, nullable=false)
     */
    private $ativo;

    /**
     * @var \Shopping\Entity\Agencia
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Agencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="agenciaId", referencedColumnName="id")
     * })
     */
    private $agenciaid;


}

