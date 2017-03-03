<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mensagens
 *
 * @ORM\Table(name="mensagens", indexes={@ORM\Index(name="FK_Mensagens_Usuario", columns={"usuarioId"})})
 * @ORM\Entity
 */
class Mensagens
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
     * @ORM\Column(name="titulo", type="string", length=255, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="mensagem", type="text", length=65535, nullable=true)
     */
    private $mensagem;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datahora", type="datetime", nullable=true)
     */
    private $datahora;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuarioId", type="integer", nullable=true)
     */
    private $usuarioid;

    /**
     * @var string
     *
     * @ORM\Column(name="de", type="string", length=50, nullable=false)
     */
    private $de;


}

