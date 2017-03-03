<?php

namespace Shopping\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Textoatendimento
 *
 * @ORM\Table(name="textoatendimento", indexes={@ORM\Index(name="FK_TextoAtendimento_CategoriaAtendimento", columns={"categoriaatendimentoId"})})
 * @ORM\Entity
 */
class Textoatendimento
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
     * @ORM\Column(name="nome", type="string", length=50, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=50, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="text", length=65535, nullable=true)
     */
    private $texto;

    /**
     * @var integer
     *
     * @ORM\Column(name="posicaomenu", type="integer", nullable=false)
     */
    private $posicaomenu;

    /**
     * @var \Shopping\Entity\Categoriaatendimento
     *
     * @ORM\ManyToOne(targetEntity="Shopping\Entity\Categoriaatendimento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoriaatendimentoId", referencedColumnName="id")
     * })
     */
    private $categoriaatendimentoid;


}

