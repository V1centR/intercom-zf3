<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detlogs
 *
 * @ORM\Table(name="detlogs", indexes={@ORM\Index(name="FK_DetLogs_Usuario", columns={"usuarioId"})})
 * @ORM\Entity
 */
class Detlogs
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
     * @ORM\Column(name="tabela", type="string", length=50, nullable=true)
     */
    private $tabela;

    /**
     * @var integer
     *
     * @ORM\Column(name="tabelaId", type="integer", nullable=true)
     */
    private $tabelaid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datahora", type="datetime", nullable=true)
     */
    private $datahora;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudoanterior", type="string", length=50, nullable=true)
     */
    private $conteudoanterior;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudoatual", type="string", length=50, nullable=true)
     */
    private $conteudoatual;

    /**
     * @var \Shopping\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuarioId", referencedColumnName="id")
     * })
     */
    private $usuarioid;


}

